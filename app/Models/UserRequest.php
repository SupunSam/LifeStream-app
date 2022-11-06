<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $table = 'user_requests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reqstatus()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}
