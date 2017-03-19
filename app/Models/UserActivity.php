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
class UserActivity extends Eloquent
{
    protected $table = 'user_activity';
    protected $fillable = ['id','user_id','project_id','content','created_at','updated_at','request_id', 'employee_id', 'proposal_id', 'type', 'proposal_employee_status_id'];
    const TYPE = ['CreateProject' => 1,
                    'ProposalRequest' => 2,
                        'ResourceBooking' => 3,
                            'ResourceRequest' => 4,
                                'ProposalEmployeeStatus' => 5];

    /**
     * created notification after created request
     */
    public static function createFromRequest(ProjectRequest $request)
    {
        return [
            'content' => $request->user->fullName() . ' created new request resource on ' . $request->project->name . ' project',
            'project_id' => $request->project->id,
            'user_id' => $request->user->id,
            'request_id' => $request->id,
            'type' => self::TYPE['ResourceRequest']
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
            'user_id' => $project->user->id,
            'type' => self::TYPE['CreateProject']
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
            'employee_id' => $project_booking->employee_id,
            'type' => self::TYPE['ResourceBooking']
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
            'employee_id' => $proposal_request->employee_id,
            'type' => self::TYPE['ProposalRequest']
        ];
    }

    /**
     * created active after update status proposal
     */
    public static function  createFromProposalEmployeeStatus(EmployeeProposalStatus $proposal_employee_status)
    {
        $employee = Employee::find($proposal_employee_status->employeeProposal->employee_id);
        $proposal = Proposal::find($proposal_employee_status->employeeProposal->proposal_id);

        return [
            'content' => $proposal_employee_status->user->name . ' have ' . $proposal_employee_status->status . ' ' . $employee->fullName(),
            'project_id' => $proposal->project->id,
            'proposal_id' => $proposal->id,
            'proposal_employee_status_id' => $proposal_employee_status->id,
            'user_id' => $proposal_employee_status->user->id,
            'employee_id' => $proposal_employee_status->employeeProposal->employee_id,
            'type' => self::TYPE['ProposalEmployeeStatus']
        ];
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function createdAt()
    {
        return new \DateTime($this->created_at);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getNewProposalActivity($user_id)
    {
        $in_id = UserActivityInvolved::getAllActivityIdByUser($user_id);
        return self::where('type', self::TYPE['ProposalRequest'])->whereIn('id',$in_id) ->get();
    }

    /**
     * @return array
     */
    public function getAllUserInvolved()
    {
        $user_activity_involved = UserActivityInvolved::where('user_activity_id', $this->id);
        $users = [];
        foreach ($user_activity_involved as $item) {
            $users[] = $item->user;
        }
        return $users;
    }


    public function getSpentHoursFromAtCreated()
    {
        $current = \Carbon\Carbon::now();
        return $current->diffInHours($this->created_at);

    }

    public function getSpentDaysFromAtCreated()
    {
        $current = \Carbon\Carbon::now();
        return $current->diffInDays($this->created_at);
    }



}

