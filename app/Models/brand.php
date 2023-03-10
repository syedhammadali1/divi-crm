<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brand extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['image'];

    public function brandSalesPerson()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'sales_id');
    }
    public function brandAssigneeEmployees()
    {
        return $this->hasMany('App\Models\brandEmployee');
    }

    public function brandProjects()
    {
        return $this->hasMany("App\Models\projects" , "brand_id" , 'id');
    }
}
