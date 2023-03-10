<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class myStickyNote extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'my_sticky_notes';
    protected $guarded = [];
    protected $fillable = ['user_id','message'];
}
