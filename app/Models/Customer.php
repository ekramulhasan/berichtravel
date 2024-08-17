<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Customer extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'balance',
        'photo',
    ];

    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'customer';

}
