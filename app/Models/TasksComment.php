<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksComment extends Model
{
    use HasFactory;


    public function messageby()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'emp_id')->withTrashed();
    }
}
