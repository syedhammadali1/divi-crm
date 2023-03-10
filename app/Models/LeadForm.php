<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadForm extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'assigner_id' , 'feedback_option' , 'feedback_message'
    ];

    public function brandByID()
    {
        return $this->hasOne('App\Models\brandEmployee', 'brand_id', 'brand_id');
    }
}
