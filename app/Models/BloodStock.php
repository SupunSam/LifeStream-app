<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    use HasFactory;

    protected $table = 'blood_stocks';

    protected $fillable = ['hospital_id', 'user_id', 'blood_type_id', 'event_id', 'source', 'count'];

    public function hasManyBloodTypes(array $bloodtype)
    {
        return null !== $this->bloodtypes()->whereIn('blood_type_id', $bloodtype)->first();
    }

    public function bldtyp()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id', 'id');
    }

    public function hsptl()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }

    public function evnt()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
