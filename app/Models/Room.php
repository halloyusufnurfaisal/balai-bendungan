<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'is_booking'];

    // public function reserved() {
    //     return $this->hasMany(Reservation::class);
    // }
}
