<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\ProjectRequest;
/**
 * Activity Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Activity extends Eloquent
{
    protected $table = 'activity';
    protected $fillable = ['id','user_id','project_id','content','created_at','updated_at','request_id'];

    /**
     * created notification after created request
     */
    public static function createFromRequest(ProjectRequest $request)
    {
        return [
            'content' => $request->user->fullName() . ' created new request resource on ' . $request->project->name . ' project',
            'project_id' => $request->project->id,
            'user_id' => $request->user->id,
            'request_id' => $request->id
        ];
    }

    /**
     * created notification after created request
     */
    public static function createFromProject(Project $project)
    {
        return [
            'content' => $project->user->fullName() . ' created new an project ' . $project->name,
            'project_id' => $project->id,
            'user_id' => $project->user->id
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function createdAt()
    {
        return new \DateTime($this->created_at);
    }

}

