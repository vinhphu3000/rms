<?php
namespace App\Modules\Core\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Proposal Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeProposal extends Eloquent
{
    protected $table = 'employee_proposal';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['role_id','start_date','end_date', 'proposal_id', 'employee_id', 'take_part_per', 'user_id'];

    /**
     * Get the user record associated with the propasal.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Core\Models\User');
    }

    /**
     * Get the role record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Modules\Core\Models\ProjectRole', 'role_id');
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee()
    {
        return $this->belongsTo('App\Modules\Core\Models\Employee');
    }

    /**
     * Get the propasal record associated with the user.
     */
    public function proposal()
    {
        return $this->belongsTo('App\Modules\Core\Models\Proposal');
    }


    /**
     * Get the status record associated with the user.
     */
    public function status()
    {
        return EmployeeProposalStatus::where('employee_proposal_id', $this->id)->orderBy('created_at', 'desc')->first();
    }

    /**
     * Get the status record associated with the user.
     */
    public function getAllStatus()
    {
        return EmployeeProposalStatus::where('employee_proposal_id', $this->id)->orderBy('created_at', 'asc')->get();
    }

    public function workOn()
    {
        if ($this->take_part_per == 100) {
            return 'Fulltime';
        }

        return $this->take_part_per . '%';
    }




}

