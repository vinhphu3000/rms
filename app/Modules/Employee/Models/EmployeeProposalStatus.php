<?php
namespace App\Modules\Employee\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * EmployeeProposalStatus Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeProposalStatus extends Eloquent
{
    protected $table = 'employee_proposal_status';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['user_id','employee_proposal_id','status', 'comment'];

    /**
     * Get the user record associated with the propasal.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Project\Models\User');
    }


    /**
     * Get the employee record associated with the user.
     */
    public function employeeProposal()
    {
        return $this->belongsTo('App\Modules\Employee\Models\EmployeeProposal');
    }


}

