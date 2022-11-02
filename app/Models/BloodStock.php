<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    use HasFactory;

    protected $table = 'blood_stocks';

    protected $fillable = [
        'bloodstock_group', 'bloodstock_name', 'bloodstock_source', 'bloodstock_count'
    ];

    public function hasManyHospitals(array $hospital)
    {
        return null !== $this->hospitals()->whereIn('hospital_id', $hospital)->first();
    }

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
}
