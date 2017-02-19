<?php
namespace App\Models;
use App\Events\ProposalEmployeeStatus;
use App\Events\ProposalRequest;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\ProjectRequest;
/**
 * Activity Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Activity extends Eloquent
{
    protected $table = 'activity';
    protected $fillable = ['id','user_id','project_id','content','created_at','updated_at','request_id', 'employee_id', 'proposal_id'];

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
            'user_id' => $project_booking->user->id,
            'employee_id' => $project_booking->employee_id
        ];
    }

    /**
     * created notification after created booking
     */
    public static function createFromProposalRequest(EmployeeProposal $proposal_request)
    {
        return [
            'content' => $proposal_request->user->name . ' proposal ' . $proposal_request->employee->fullName() . ' role ' . $proposal_request->role->name,
            'project_id' => $proposal_request->proposal->project_id,
            'proposal_id' => $proposal_request->id,
            'user_id' => $proposal_request->user->id,
            'employee_id' => $proposal_request->employee_id
        ];
    }

    /**
     * created active after update status proposal
     */
    public static function createFromProposalEmployeeStatus(EmployeeProposalStatus $proposal_employee_status)
    {
        $employee = Employee::find($proposal_employee_status->employeeProposal->employee_id);
        $proposal = Proposal::find($proposal_employee_status->employeeProposal->proposal_id);

        return [
            'content' => $proposal_employee_status->user->name . ' have ' . $proposal_employee_status->status . ' ' . $employee->fullName(),
            'project_id' => $proposal->project->id,
            'proposal_id' => $proposal->id,
            'user_id' => $proposal_employee_status->user,
            'employee_id' => $proposal_employee_status->employeeProposal->employee_id
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

