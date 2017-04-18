<?php
namespace App\Modules\Project\Models;
use App\Modules\Employee\Models\EmployeeProposal;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Propasal Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Proposal extends Eloquent
{
    protected $table = 'proposal';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['project_id','user_id','request_id'];

    /**
     * Get the user record associated with the propasal.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Project\Models\User');
    }

    /**
     * Get the user record associated with the propasal.
     */
    public function project()
    {
        return $this->belongsTo('App\Modules\Project\Models\Project');
    }

    /**
     * return all employee propasal
     * @return mixed
     */
    public function getEmployeeProposal()
    {
        return EmployeeProposal::where('proposal_id', $this->id)->get();
    }

}

