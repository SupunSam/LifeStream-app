<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function srchsptl()
    {
        return $this->belongsTo(Hospital::class, 'src_hsptl_id', 'id');
    }

    public function desthsptl()
    {
        return $this->belongsTo(Hospital::class, 'dest_hsptl_id', 'id');
    }

    public function srcbldstk()
    {
        return $this->belongsTo(BloodStock::class, 'src_bldstk_id', 'id');
    }

    public function destbldstk()
    {
        return $this->belongsTo(BloodStock::class, 'dest_bldstk_id', 'id');
    }

    public function bldtyp()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id', 'id');
    }

    public function reqstatus()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}
