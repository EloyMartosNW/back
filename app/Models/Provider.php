<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
        'user_id',
        'is_from_spain',
        'time_as_provider',
    ];

    protected $casts = [
        'is_from_spain' => 'boolean',
    ];

    /**
     * Get the user that owns the provider.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
