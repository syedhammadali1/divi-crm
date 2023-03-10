<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class project_attachment extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'project_attachment';
	protected $guarded = [];
    protected $fillable = ['is_final', 'status'];


    public function statusUpdatedBy(){
        return $this->belongsTo(User::class, 'last_status_update_by');
    }
}
