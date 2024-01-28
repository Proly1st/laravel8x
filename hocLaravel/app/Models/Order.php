<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Xác định tên bảng
    protected $table = 'order';

    use HasFactory;
    protected $fillable=[
        'customer_name',
        'prefix_name',
        'customer_phone',
        'customer_addres',
        'total_price',
        'voucher',
        'total_quantity',
        'status',
        'note'
    ];

    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}
