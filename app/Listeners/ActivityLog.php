<?php

namespace App\Listeners;

use App\Events\CreateProject;
use App\Events\ResourceBooking;
use App\Events\ResourceRequest;
use App\Events\ProposalRequest;
use App\Events\ProposalEmployeeStatus;
use App\Models\Activity;
use App\Models\Project;
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
        $activity = Activity::createFromRequest($event->request);
        Activity::create($activity);
    }

    /**
     * Handle the event.
     *
     * @param  ProposalRequest  $event
     * @return void
     */
    public function proposalRequest(ProposalRequest $event)
    {
        $activity = Activity::createFromProposalRequest($event->proposal_employee);
        Activity::create($activity);
    }

    /**
     * Handle the event.
     *
     * @param  ProposalEmployeeStatus  $event
     * @return void
     */
    public function proposalEmployeeStatus(ProposalEmployeeStatus $event)
    {
        $activity = Activity::createFromProposalEmployeeStatus($event->proposal_employee_status);
        Activity::create($activity);
    }


    /**
     * Handle the event.
     *
     * @param  Project  $event
     * @return void
     */
    public function createProject(CreateProject $event)
    {
        $activity = Activity::createFromProject($event->project);
        Activity::create($activity);
   }

    /**
     * Handle the event.
     *
     * @param  Project  $event
     * @return void
     */
    public function createBooking(ResourceBooking $event)
    {
        $activity = Activity::createFromBooking($event->booking);
        Activity::create($activity);
    }


}