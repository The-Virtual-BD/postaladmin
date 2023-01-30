<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'requestDate',
        'leg',
        'flightNo',
        'origin',
        'deperture',
        'deptime',
        'arrtime',
        'ftime',
        'equipment',
        'change',
        'connect',
    ];
}
