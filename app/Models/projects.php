<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class projects extends Model
{
    use SoftDeletes;
 	protected $primaryKey = 'id';
  	protected $table = 'projects';
	protected $guarded = [];
    protected $fillable = ['manager_id','assign_project_to', 'brand_id','project_type','paid_cost','remaining_cost','projownertype','support_id','currency_id','source_account_id','url','deadline'];

	public function packages()
	{
		return $this->hasMany("App\Models\project_package" , "project_id" , 'id');
	}
    public function projectTasks()
    {
        return $this->hasMany("App\Models\project_task" , "project_id" , 'project_number');
    }

    public function projectTasksProject()
    {
        return $this->hasMany("App\Models\project_task_label" , "project_id" , 'project_number');
    }

	public function support()
	{
		return $this->belongsTo("App\Models\User" , "user_id" , 'emp_id')->withTrashed();
	}
    public function supportPerson()
	{
		return $this->belongsTo("App\Models\User" , "support_id" , 'emp_id')->withTrashed();
	}
    public function manager()
    {
        return $this->belongsTo("App\Models\User" , "manager_id" , 'emp_id')->withTrashed();
    }
    public function assign_project_to_user()
    {
        return $this->hasOne('App\Models\User', 'emp_id', 'assign_project_to')->withTrashed();;
    }

	public function client()
	{
		return $this->belongsTo("App\Models\User" , "client_email" , 'email');
	}

    public function brand()
    {
        return $this->hasOne('App\Models\brand', 'id', 'brand_id')->withTrashed();;
    }

    public function devproject()
    {
//        return $this->hasOne('App\Models\DevelopmentProject', 'order_id', 'project_number');
        return $this->hasOne('App\Models\DevelopmentProject', 'project_id', 'id');
    }
    public function contentproject()
    {
        return $this->hasOne('App\Models\ContentProject', 'project_id', 'id');
    }
    public function designproject()
    {
        return $this->hasOne('App\Models\DesignProject', 'project_id', 'id');
    }
    public function seoproject()
    {
        return $this->hasOne('App\Models\SeoProject', 'project_id', 'id');
    }
    public function otherproject()
    {
        return $this->hasOne('App\Models\OtherProject', 'project_id', 'id');
    }

    public function sourceaccount(){
        return $this->belongsTo('App\Models\SourceAccount','source_account_id');
    }

}
