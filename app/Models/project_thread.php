<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_thread extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'project_thread';
  
    protected $guarded = [];  

    public function client(){
    	return $this->belongsTo('App\Models\User', 'client_id' , 'id');
    }
    public function employee(){
    	return $this->belongsTo('App\Models\User', 'created_by' , 'emp_id');
    }
}
