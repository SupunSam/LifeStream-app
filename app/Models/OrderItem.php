<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public function hasManyBloodStocks(array $bloodstock)
    {
        return null !== $this->bloodstocks()->whereIn('bloodstock_id', $bloodstock)->first();
    }
}
