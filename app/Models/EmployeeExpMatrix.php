<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeeExpMatrix Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeExpMatrix extends Eloquent
{
   protected $table = 'employee_exp_matrix';
   protected $fillable = ['id','employee_id','exp_id','level','month','note'];
}

