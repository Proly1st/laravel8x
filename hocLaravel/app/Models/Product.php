<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillabale=[
        'name',
        'prefix',
        'category_id',
        'inventory',
        'description',
        'image',
        'status',
        'price',
        'promotion',
        'promotion_type',

    ];
    public function category(){

        return $this->belongsTo(Categories::class);
    }
}
