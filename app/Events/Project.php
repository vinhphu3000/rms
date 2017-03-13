<?php

namespace App\Events;

use App\Models\Project as ProjectModel;
use Illuminate\Queue\SerializesModels;

class Project
{
    use SerializesModels;

    public $project;

    /**
     * ResourceRequest constructor.
     * Create a new event instance.
     * @param Project $request
     */
    public function __construct(ProjectModel $project)
    {
        $this->project = $project;
    }
}