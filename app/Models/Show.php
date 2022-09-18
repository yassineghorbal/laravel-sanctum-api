<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist',
        'date',
        'place',
        'price',
        'seats'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
