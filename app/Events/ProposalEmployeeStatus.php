<?php

namespace App\Events;

use App\Models\EmployeeProposalStatus;
use Illuminate\Queue\SerializesModels;

class ProposalEmployeeStatus
{
    use SerializesModels;

    public $proposal_employee_status;

    /**
     * ProposalRequest constructor.
     * Create a new event instance.
     * @param EmployeeProposalStatus $proposal_employee_status
     */
    public function __construct(EmployeeProposalStatus $proposal_employee_status)
    {
        $this->proposal_employee_status = $proposal_employee_status;
    }
}