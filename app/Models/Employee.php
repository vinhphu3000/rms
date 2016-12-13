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

}

