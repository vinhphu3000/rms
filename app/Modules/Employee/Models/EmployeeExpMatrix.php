<?php
namespace App\Modules\Employee\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeeExpMatrix Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeExpMatrix extends Eloquent
{
   protected $table = 'employee_exp_matrix';
   protected $fillable = ['id','employee_id','exp_id','level','month','note'];

   /**
    * Get the EmployeeExp record associated with the user.
    */
   public function exp()
   {
      return $this->belongsTo('App\Modules\Employee\Models\EmployeeExp', 'exp_id');
   }
}

