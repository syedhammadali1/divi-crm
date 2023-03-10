<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignProject extends Model
{
    use HasFactory;

    public function industryById()
    {
        return $this->hasOne('App\Models\Industry', 'id', 'industry_id');
    }
}
