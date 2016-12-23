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

    /**
     * Get the phone record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\ProjectRole', 'project_role_id');
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
                        'label' => $item->role->name . "(" . $item->take_part_per . "%), Spent hour: " . $item->spent_hour . ',  ' . $item->request_type,
                        'customClass' => "ganttRed"
                    ]]
            ];
        }
        return $gantt_data;
    }

}

