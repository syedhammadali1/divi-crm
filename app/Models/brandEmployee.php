<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandEmployee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'brand_employees';
    protected $guarded = [];


    public function brandName()
    {
        return $this->hasOne('App\Models\brand', 'id', 'brand_id');
    }
    public function brandAssigneeTo()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'employee_id');
    }
}
