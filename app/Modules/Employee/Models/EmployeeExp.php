<?php
namespace App\Modules\Employee\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeeExp Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeExp extends Eloquent
{
   protected $table = 'employee_exp';
   protected $fillable = ['id','name','type'];
}

