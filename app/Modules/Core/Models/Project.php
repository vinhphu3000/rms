<?php
namespace App\Modules\Core\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Project Model class
 * @author Thieu Le Quang <quangthieuagu@gmail.com>
 */
class Project extends Eloquent
{
    protected $table = 'project';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name','status','desc','icon', 'user_id','created_at','updated_at', 'client', 'estimate', 'estimate_type'];
    public static $project_status = [2 => ['lable' => 'BID', 'class' => 'warning'], 0 => ['lable' => 'Bid fail', 'class' => 'danger'], 3 => ['lable' => 'Progressing', 'class' => 'info'], 1 => ['lable' => 'Completed', 'class' => 'success']];
    public static $estimate_type = [1 => 'Manday', 2 => 'Hour'];
    public static function getTableColumns() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing('project');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Core\Models\User');
    }

    public function memeber()
    {
        return ProjectBooking::where('project_id', $this->id)->where('remove',0)->get();
    }

}

