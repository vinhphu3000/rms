<?php

namespace App\Listeners;

use App\Events\Project as ProjectEvent;
use App\Events\ResourceBooking;
use App\Events\ResourceRequest;
use App\Events\ProposalRequest;
use App\Events\ProposalEmployeeStatus;
use App\Models\Project;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserActivityInvolved;
use Faker\Provider\cs_CZ\DateTime;

class ActivityLog
{

    /**
     * Handle the event.
     *
     * @param  ResourceRequest  $event
     * @return void
     */
    public function resourceRequest(ResourceRequest $event)
    {
        $activity = UserActivity::createFromRequest($event->request);
        $user_activity = UserActivity::create($activity);

        foreach (User::where('type','admin')->get() as $user) {
            UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user->id]);
        }

    }

    /**
     * Handle the event.
     *
     * @param  ProposalRequest  $event
     * @return void
     */
    public function proposalRequest(ProposalRequest $event)
    {
        $activity = UserActivity::createFromProposalRequest($event->proposal_employee);
        $user_activity = UserActivity::create($activity);
        UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user_activity->project->user_id]);
    }

    /**
     * Handle the event.
     *
     * @param  ProposalEmployeeStatus  $event
     * @return void
     */
    public function proposalEmployeeStatus(ProposalEmployeeStatus $event)
    {
        $activity = UserActivity::createFromProposalEmployeeStatus($event->proposal_employee_status);
        $user_activity = UserActivity::create($activity);
        if($user_activity->user->type =='member') {
            foreach (User::where('type','admin')->get() as $user) {
                UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user->id]);
            }
        } else {
            UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user_activity->project->user_id]);
        }

    }


    /**
     * Handle the event.
     *
     * @param  Project  $event
     * @return void
     */
    public function createProject(ProjectEvent $event)
    {
        $activity = UserActivity::createFromProject($event->project);

        $user_activity = UserActivity::create($activity);
        foreach (User::where('type','admin')->get() as $user) {
            UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user->id]);
        }
   }

    /**
     * Handle the event.
     *
     * @param  ResourceBooking  $event
     * @return void
     */
    public function createBooking(ResourceBooking $event)
    {
        $activity = UserActivity::createFromBooking($event->booking);
        $user_activity = UserActivity::create($activity);
        UserActivityInvolved::create(['user_activity_id' => $user_activity->id, 'user_id' => $user_activity->project->user_id]);
    }


}