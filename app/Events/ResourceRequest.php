<?php

namespace App\Events;

use App\Models\ProjectRequest;
use Illuminate\Queue\SerializesModels;

class ResourceRequest
{
    use SerializesModels;

    public $request;

    /**
     * ResourceRequest constructor.
     * Create a new event instance.
     * @param ProjectRequest $request
     */
    public function __construct(ProjectRequest $request)
    {
        $this->request = $request;
    }
}