<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSourceAccount extends Model
{
   use HasFactory;
//    public $timestamps = false;
//    protected $table = 'brand_source_accounts';
//    protected $guarded = [];
    protected $fillable = [
        'brand_id','source_account_id'
    ];

    public function brandName()
    {
        return $this->hasOne('App\Models\brand', 'id', 'brand_id');
    }
    public function sourceAccountAssigneeTo()
    {
        return $this->hasOne('App\Models\SourceAccount', 'id', 'source_account_id');
    }


}
