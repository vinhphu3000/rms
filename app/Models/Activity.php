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

    /**
     * created notification after created booking
     */
    public static function createFromBooking(ProjectBooking $project_booking)
    {
        return [
            'content' => $project_booking->user->name . ' add ' . $project_booking->employee->fullName() . ' role ' . $project_booking->role->name,
            'project_id' => $project_booking->project_id,
            'booking_id' => $project_booking->id,
            'user_id' => $project_booking->user->id
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

