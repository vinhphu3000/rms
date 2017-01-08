<?php

namespace App\Listeners;

use App\Events\CreateProject;
use App\Events\ResourceBooking;
use App\Events\ResourceRequest;
use App\Models\Notification;
use App\Models\User;

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
        foreach (User::where('type','admin').get() as $user) {
            $notification['sent_to'] = $user->id;
            Notification::create($notification);
        }
    }


    /**
     * Handle the event.
     *
     * @param  CreateProject  $event
     * @return void
     */
    public function createProject(CreateProject $event)
    {
        $notification = Notification::createFromProject($event->project);
        foreach (User::where('type','admin').get() as $user) {
            $notification['sent_to'] = $user->id;
            Notification::create($notification);
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
        $notification = Notification::createFromBooking($event->booking);

        foreach (User::where('type','member').get() as $user) {
            $notification['sent_to'] = $user->id;
            Notification::create($notification);
        }
    }
}