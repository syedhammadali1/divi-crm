<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoProject extends Model
{
    use HasFactory;

    public function regionById()
    {
        return $this->hasOne('App\Models\Country', 'id', 'region_id');
    }
}
