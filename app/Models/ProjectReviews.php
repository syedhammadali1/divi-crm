<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectReviews extends Model
{
    use HasFactory;

    public function projectById()
    {
        return $this->belongsTo("App\Models\projects" , 'project_number' , 'project_number');
    }

    public function employeesByID()
    {
        return $this->belongsTo("App\Models\User" , 'emp_id' , 'emp_id');
    }
}
