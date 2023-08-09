<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'gender',
        'price',
        'image',
        'description',
        'brand_id',
        'category_id',
    ];
}
