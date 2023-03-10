<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brand_target extends Model
{
    use HasFactory , SoftDeletes;

    public function brandName()
    {
        return $this->hasOne('App\Models\brand', 'id', 'brand_id')->withTrashed(); // Todo imp info if you want the deleted Data.
    }
    public function brandTargetCreateBY()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'create_by');
    }
    public function brandTargetManager()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'brand_manager_id');
    }
}
