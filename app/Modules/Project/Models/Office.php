<?php
namespace App\Modules\Project\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Office Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Office extends Eloquent
{
   protected $table = 'office';
   protected $fillable = ['id','name','code'];
}

