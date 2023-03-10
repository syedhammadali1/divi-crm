<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project_transition extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['package_id', 'parent_id'];

    public function empinfo()
    {
        return $this->belongsTo("App\Models\User" , "emp_id" , 'emp_id');
    }
    public function packagename()
    {
        return $this->belongsTo("App\Models\packages" , "package_id" , 'id');
    }

    public function inner_package_name($parent_id)
    {
        return project_transition::with('packagename')->where("parent_id" , $parent_id)->get();
    }
}
