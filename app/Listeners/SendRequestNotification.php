<?php

namespace App\Listeners;

use App\Events\CreateProject;
use App\Events\ResourceRequest;
use App\Models\Notification;

class SendRequestNotification
{

    /**
     * Handle the event.
     *
     * @param  ResourceRequest  $event
     * @return void
     */
    public function resourceRequest(ResourceRequest $event)
    {
        $notification = Notification::createFromRequest($event->request);
        Notification::create($notification);
    }


    /**
     * Handle the event.
     *
     * @param  ResourceRequest  $event
     * @return void
     */
    public function createProject(CreateProject $event)
    {
        $notification = Notification::createFromProject($event->project);
        Notification::create($notification);
    }
}