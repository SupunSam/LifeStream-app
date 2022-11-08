<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'status',
    ];

    public function hasManyOrderItems(array $orderitem)
    {
        return null !== $this->orderitems()->whereIn('order_id', $orderitem)->first();
    }

    public function hasManyBloodStocks(array $bloodstock)
    {
        return null !== $this->bloodstocks()->whereIn('blood_stock_id', $bloodstock)->first();
    }

    public function hsptl()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
