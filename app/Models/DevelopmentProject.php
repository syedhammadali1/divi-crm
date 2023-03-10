<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevelopmentProject extends Model
{
    use HasFactory;
    protected $fillable = ['category','platform','theme_color' ];
}
