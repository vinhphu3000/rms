<?php

namespace App\Events;

use App\Modules\Project\Models\ProjectBooking;
use Illuminate\Queue\SerializesModels;

class ResourceBooking
{
    use SerializesModels;

    public $booking;

    /**
     * ResourceBooking constructor.
     * Create a new event instance.
     * @param ProjectBooking $booking
     */
    public function __construct(ProjectBooking $booking)
    {
        $this->booking = $booking;
    }
}