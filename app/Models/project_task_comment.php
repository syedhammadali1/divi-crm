<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_task_comment extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'project_task_comment';
  
    protected $guarded = [];  

    public function from(){
    	return $this->belongsTo('App\User', 'from_user_id' , 'id');
    }
    public function to(){
    	return $this->belongsTo('App\User', 'to_user_id' , 'id');
    }
}
