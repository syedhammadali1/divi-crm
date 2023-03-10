<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    protected $table = 'notifications';
	public $primaryKey = 'id';
    protected $fillable = [
    	'is_active','is_deleted'
    ];
}