<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'product_name',
        'product_id',
        'image',
        'price',
        'image',
        'quantity',
        'payment_status',
        'dilivery_status',
        
        
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
