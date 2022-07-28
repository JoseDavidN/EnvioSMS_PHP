<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_dato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres', 'apellidos', 'telefono', 'edad', 'comuna', 'cargo',
    ];
}
