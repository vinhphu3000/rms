<?php
namespace App\Modules\Employee\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeePosition Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeePosition extends Eloquent
{
   protected $table = 'employee_position';
   protected $fillable = ['id','name','code'];
   
}

