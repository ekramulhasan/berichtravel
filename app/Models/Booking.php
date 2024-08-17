<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Booking extends Model
{

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_phone',
        'checkout_date',
        'status',

    ];


    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
