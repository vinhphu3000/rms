<?php
namespace App\Modules\Employee\Models;
use App\Modules\Project\Models\ProjectBooking;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Config;
/**
 * Employee Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Employee extends Eloquent
{
   protected $table = 'employee';
   public static $csv_map_column = [];
    /**
     * Get the phone record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Modules\Employee\Models\EmployeeRole', 'role_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Modules\Employee\Models\EmployeePosition', 'position_id');
    }

    public function office()
    {
        return $this->belongsTo('App\Modules\Project\Models\Office', 'office_id');
    }

    public function fullName()
    {
        return $this->first_name . ' ' .  $this->last_name;
    }

    public function availableInfo()
    {
        $last = ProjectBooking::where('employee_id', $this->id)->orderBy('end_date', 'desc')->first();
        if (empty($last->end_date)) {
            return '<span class="label label-success">Available from now</span>';
        }

        $last_end_date =  $last->end_date->format('m/d/Y');
        if ($last_end_date == date('m/d/Y')) {
            return '<span class="label label-success">Available from now</span>';
        }
        return '<span class="label label-info">Available from ' . $last->end_date->format('m/d/Y') . '</span>';
    }



    public static function getTableColumns() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing('employee');
    }

    public static function getCVFile($employee)
    {
        if (!empty($employee->cv_file)) {

            $arr = explode('_', $employee->cv_file);
            $display_cv_file_name= implode('_', array_slice($arr, 1, 3));
            $ext = pathinfo($display_cv_file_name, PATHINFO_EXTENSION);
            $cvFileName = md5($employee->cv_file) . md5('aaaaaaawwwwqqqxxxx') . '.' . $ext;
            return [
                'display_name' => $display_cv_file_name,
                'real_name' => $cvFileName,
                'md5_name' => md5($employee->cv_file) . '.' . $ext,
                'db_name' => $employee->cv_file
            ];
        }

        return [
            'display_name' => '',
            'real_name' => '',
            'md5_name' => '',
            'db_name' => ''
        ];

    }

    public function getCV()
    {
        if (!empty($this->cv_file)) {

            $arr = explode('_', $this->cv_file);
            $display_cv_file_name= implode('_', array_slice($arr, 1, 3));
            $ext = pathinfo($display_cv_file_name, PATHINFO_EXTENSION);
            $cvFileName = md5($this->cv_file) . md5('aaaaaaawwwwqqqxxxx') . '.' . $ext;
            return [
                'display_name' => $display_cv_file_name,
                'real_name' => $cvFileName,
                'md5_name' => md5($this->cv_file) . '.' . $ext,
                'db_name' => $this->cv_file
            ];
        }

        return [
            'display_name' => '',
            'real_name' => '',
            'md5_name' => '',
            'db_name' => ''
        ];

    }

    public static function generateCVFileName($id, $ext, $format = '')
    {
        $display_cv_file_name = 'cv_file_' . date('Y-m-d-h-i-s'). '.' . $ext;
        $cv_db_file_name = $id . '_' . $display_cv_file_name;
        $cvFileName = md5($cv_db_file_name) . md5('aaaaaaawwwwqqqxxxx') . '.' . $ext;

        return [
            'display_name' => $display_cv_file_name,
            'real_name' => $cvFileName,
            'md5_name' => md5($cv_db_file_name) . '.' . $ext,
            'db_name' => $cv_db_file_name
        ];
    }

    public function avatarPath()
    {
        if (!empty($this->avatar)) {
            return Config::get('constants.PATH_AVATAR') . $this->avatar;
        }
        return Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR');
    }

    public static function convertTimeline($proposal)
    {
        $timeline_data = [];

        foreach ($proposal as $item) {
            $description = [];
            $description[]= '- Be proposal to project ' . $item['proposal']->project->name . ' by ' . $item['proposal']->user->name;
            foreach ($item['employee_proposal']->getAllStatus() as $status) {
                $description[] = '- ' . $status->created_at->format('F d, Y') . ' be ' . $status->status . ' by ' . $status->user->name . ' ' . (!empty($status->comment) ? ' with reason : ' . $status->comment : '');
            }

            $description_text = implode('<br/>', $description);
            $timeline_data[] = [
                'title' => $item['proposal']->created_at->format('Y, F d'),
                'description' => $description_text,
                'startDate' =>  $item['proposal']->created_at->format('F m, Y h:i:s A'),
                'endDate'=> null

            ];
        }
        return $timeline_data;
    }

    public static function getNumberEmployeeNeedUpdateCVOverDay($day)
    {
        $dt = \Carbon\Carbon::now();
        $dt->subDays($day);
        return self::where('updated_at', '<=', $dt)->count();
    }


}

