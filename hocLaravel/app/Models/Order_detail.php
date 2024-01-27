<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    // Xác định tên bảng
    protected $table = 'order_detail';

    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'original_price',
        'price',
        'total_price',
        'note'
    ];

    // Định nghĩa quan hệ khóa ngoại với Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    // Định nghĩa quan hệ khóa ngoại với Product
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
