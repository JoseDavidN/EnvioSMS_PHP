<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tbl_user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     *  Los atributos que son asignables en masa
     * 
     * @var array<int, string>
     */

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     *  Los atributos que deben ocultarse para la serialización
     * 
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
