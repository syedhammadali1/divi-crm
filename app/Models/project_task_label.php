<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project_task_label extends Model
{
    use SoftDeletes;

 	protected $primaryKey = 'id';
  	protected $table = 'project_task_label';
	protected $guarded = [];

	public function task_detail()
	{
		return $this->belongsTo("App\Models\packages" , "package_id" , 'id');
	}

	public function assigner()
	{
		return $this->belongsTo("App\Models\User" , "title" , 'emp_id')->withTrashed();
	}
    public function taskInfo()
    {
        return $this->belongsTo("App\Models\project_task" , "task_number" , 'task_number');
    }
}
