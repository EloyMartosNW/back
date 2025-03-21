<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'date',
        'time',
        'amount',
        'commission',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
