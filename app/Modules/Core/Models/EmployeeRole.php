<?php
namespace App\Modules\Core\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeeRole Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeRole extends Eloquent
{
   protected $table = 'employee_role';
   protected $fillable = ['id', 'name','code'];
   
}

