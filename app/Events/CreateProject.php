<?php

namespace App\Events;

use App\Models\Project;
use Illuminate\Queue\SerializesModels;

class CreateProject
{
    use SerializesModels;

    public $project;

    /**
     * ResourceRequest constructor.
     * Create a new event instance.
     * @param Project $request
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
}