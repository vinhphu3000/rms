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
        return $this->hasOne('App\Models\EmployeeRole', 'role');
    }

    public function position()
    {
        return $this->hasOne('App\Models\EmployeePosition', 'position');
    }

}

