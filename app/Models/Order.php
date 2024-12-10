<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        // 'buyer_name',
        // 'buyer_surname',
        // 'buyer_dni',
        // 'buyer_tel',
        // 'products',
        // 'shipping_address',
        // 'shipping_status',
        // 'payment_method' ,
        // 'payment_total' ,
        // 'order_status' ,
    ];

    protected $casts = [
        'products' => 'array',
        'shipping_address' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

