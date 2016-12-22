<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Project Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Project extends Eloquent
{
    protected $table = 'project';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name','status','desc','icon', 'user_id','created_at','updated_at'];

    public static function getTableColumns() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing('project');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}

