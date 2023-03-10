<?php

namespace App\Models;

use App\Models\project_task_label;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project_task extends Model
{
    use SoftDeletes;

    protected $table = 'project_task';
	public $primaryKey = 'id';
    protected $fillable = [
    	'is_active','is_deleted','status' ,'task_updated_at','update_by','progress','progress_by','task_label'
    ];

    public function support()
	{
		return $this->belongsTo("App\Models\User" , "user_id" , 'emp_id')->withTrashed();
	}

	public function assign_under()
	{
		return $this->belongsTo("App\Models\User" , "dpt_to" , 'emp_id')->withTrashed();
	}

	public function assigner()
	{
		return $this->belongsTo("App\Models\User" , "assigned_to" , 'emp_id')->withTrashed();
	}

    public function projectsById()
    {
        return $this->belongsTo("App\Models\projects" , "project_id" , 'project_number');
    }

    public function projectTaskLabel()
    {
        return $this->hasMany("App\Models\project_task_label" , "project_id" , 'project_id');
    }
    public function projectTaskLabelByTaskid()
    {
        return $this->hasMany("App\Models\project_task_label" , "task_number" , 'task_number');
    }

	public function assigner_label($task_id)
	{
		return project_task_label::where("type" , 1)->where("task_number" , $task_id)->first();
	}

	public function assigner_tags($task_id)
	{
		return project_task_label::where("type" , 2)->where("task_number" , $task_id)->first();
	}

	public function total_users($task_id)
	{
		$data = project_task_label::where("type" , 1)->where("task_number" , $task_id)->get();
		return $data;
	}

    public function taskUpdatedBy()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'update_by');
    }

}
