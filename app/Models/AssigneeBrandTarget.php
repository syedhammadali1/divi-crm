<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssigneeBrandTarget extends Model
{
    use HasFactory , SoftDeletes;

    public function brandTarget()
    {
        return $this->hasOne('App\Models\brand_target', 'id', 'brand_target_id');
    }
    public function brandTargetAssigner()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'assigner_emp_id');
    }
    public function brandTargetAssignerCreateBy()
    {
        return $this->hasOne('App\Models\user', 'emp_id', 'create_by');
    }
}
