<?php

namespace App\Events;

use App\Models\EmployeeProposal;
use Illuminate\Queue\SerializesModels;

class ProposalRequest
{
    use SerializesModels;

    public $proposal_employee;

    /**
     * ProposalRequest constructor.
     * Create a new event instance.
     * @param EmployeeProposal $proposal_employee
     */
    public function __construct(EmployeeProposal $proposal_employee)
    {
        $this->proposal_employee = $proposal_employee;
    }
}