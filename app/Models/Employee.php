<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
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
        return $this->belongsTo('App\Models\EmployeeRole', 'role_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\EmployeePosition', 'position_id');
    }

    public function office()
    {
        return $this->belongsTo('App\Models\Office', 'office_id');
    }

    public static function getTableColumns() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing('employee');
    }

}

