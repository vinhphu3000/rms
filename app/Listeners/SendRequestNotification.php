<?php

namespace App\Listeners;

use App\Events\Project as ProjectEvent;
use App\Events\ProposalEmployeeStatus;
use App\Events\ResourceBooking;
use App\Events\ResourceRequest;
use App\Events\ProposalRequest;
use App\Modules\Project\Models\Notification;
use App\Modules\Project\Models\User;

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
        foreach (User::where('type','admin')->get() as $user) {
            $notification['sent_to'] = $user->id;
            Notification::create($notification);
        }
    }


    /**
     * Handle the event.
     *
     * @param  ProjectEvent  $event
     * @return void
     */
    public function createProject(ProjectEvent $event)
    {
        $notification = Notification::createFromProject($event->project);
        foreach (User::where('type','admin')->get() as $user) {
            $notification['sent_to'] = $user->id;
            Notification::create($notification);
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

        $notification = Notification::createFromProposal($event->proposal_employee);
        Notification::create($notification);

    }


    /**
     * Handle the event.
     *
     * @param  ProposalRequest  $event
     * @return void
     */
    public function proposalEmployeeStatus(ProposalEmployeeStatus $event)
    {

        $notification = Notification::createFromProject($event->proposal_employee_status);
        foreach (User::where('type','admin')->get() as $user) {
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
        $notification['send_to'] = $event->booking->getUserRelated()->id;
        Notification::create($notification);

    }
}