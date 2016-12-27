<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * ProjectRequest Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class ProjectRequest extends Eloquent
{
    protected $table = 'project_request';

    protected $fillable = ['user_id','project_id','type','params', 'note','created_at','updated_at'];
    /**
     * Get the phone record associated with the user.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function params()
    {
        return json_decode($this->params);
    }


}

