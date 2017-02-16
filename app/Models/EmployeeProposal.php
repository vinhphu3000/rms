<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Proposal Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class EmployeeProposal extends Eloquent
{
    protected $table = 'employee_proposal';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['role_id','start_time','end_time', 'proposal_id', 'employee_id', 'status', 'comment'];

    /**
     * Get the user record associated with the propasal.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the role record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\ProjectRole', 'role_id');
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    /**
     * Get the propasal record associated with the user.
     */
    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }




}

