<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * ProjectBooking Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class ProjectBooking extends Eloquent
{
    protected $table = 'project_booking';
    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];
    protected $fillable = ['id','employee_id','project_id','take_part_per','project_role_id','start_date','end_date','spent_hour','request_type','book_type','user_id','note','created_at','updated_at'];

    public static function getTableColumns() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing('project');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getUserRelated()
    {
        $project = Project::find($this->project_id);
        return $project->user;
    }

    /**
     * Get the phone record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\ProjectRole', 'project_role_id');
    }

    public function joinLable()
    {
        if ($this->book_type == 'Reserve') {
            return $this->book_type . ' for 1 week';
        }

        if ($this->take_part_per == 100) {
            return 'Fulltime';
        }

        return $this->take_part_per . '%';

    }

    public function per()
    {
        if ($this->take_part_per == 100) {
            return 'Fulltime';
        }

        return $this->take_part_per . '%';

    }

    public static function convertDataGanttChart($project_booking)
    {
        $gantt_data = [];
        foreach ($project_booking as $item) {
            $gantt_data[] = [
                'name' => $item->role->code,
                'desc' => $item->employee->first_name . ' ' . $item->employee->last_name,
                'values' => [
                    [
                        'from' => "/Date(" . strtotime($item->start_date) * 1000 . ")/",
                        'to' => "/Date(" . strtotime($item->end_date) * 1000 . ")/",
                        'label' => $item->role->name . " - " . $item->joinLable(),
                        'customClass' => "ganttGreen",
                        'dataObj' => ['employee_id' => $item->employee->id, 'booking_id' => $item->id]
                    ]]
            ];
        }
        return $gantt_data;
    }



}

