<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Notification Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Notification extends Eloquent
{
    protected $table = 'notification';
    protected $fillable = ['id','title','send_to','content','created_at','updated_at','has_attachment','status_read','status_seen','user_id', 'link'];

    /**
     * created notification after created request
     */
    public static function createFromRequest(ProjectRequest $request)
    {
        return [
            'title' => 'Create new request resource on ' . $request->project->name . ' project',
            'content' => $request->user->fullName() . ' created new request resource on ' . $request->project->name . ' project',
            'send_to' => 24,
            'user_id' => $request->user_id
        ];
    }


    /**
     * created notification after created project
     */
    public static function createFromProject(Project $project)
    {
        return [
            'title' => 'Create new project ' . $project->name,
            'content' => $project->user->fullName() . ' created new project ' . $project->name,
            'send_to' => 24,
            'user_id' => $project->user->id,
            'link' => url('project/details/' . $project->id)
        ];
    }


    public function send()
    {

    }

    public function seen($is_seen = 1)
    {

    }

    public function read($is_read = 1)
    {

    }


}

