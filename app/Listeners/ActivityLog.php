<?php

namespace App\Listeners;

use App\Events\CreateProject;
use App\Events\ResourceBooking;
use App\Events\ResourceRequest;
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