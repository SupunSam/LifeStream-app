<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;

    protected $table = 'blood_types';

    protected $fillable = [
        'bloodtype_code', 'bloodtype_name', 'bloodtype_gets', 'bloodtype_gives'
    ];

    public function hasManyBloodStocks(array $bloodstock)
    {
        return null !== $this->blood_stocks()->whereIn('bldtype_id', $bloodstock)->first();
    }
}
