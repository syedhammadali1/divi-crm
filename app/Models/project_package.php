<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_package extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'project_package';
	protected $guarded = [];

	public function package()
	{
		return $this->belongsTo("App\Models\packages" , "package_id" , 'id');
	}
}
