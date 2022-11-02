<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';

    protected $fillable = [
        'hsptl_name',
        'hsptl_category',
        'hsptl_address',
        'hsptl_city',
        'hsptl_desc',
        'hsptl_web',
        'hsptl_logo',
        'hsptl_cover',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasManyEvents(array $event)
    {
        return null !== $this->events()->whereIn('event_id', $event)->first();
    }
}
