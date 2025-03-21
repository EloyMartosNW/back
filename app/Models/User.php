<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_provider',
        'password',
        'last_name',
        'phone',
        'nationality',
        'actual_country',
        'actual_location',
        'description',
        'personal_url',
        'provider_id',
    ];
    
    protected $casts = [
        'password' => 'hashed',
        'is_provider' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the provider associated with the user.
     */
    public function provider() : HasOne
    {
        return $this->hasOne(Provider::class);
    }

    /**
     * Get the company associated with the user.
     */
    public function company() : HasMany
    {
        return $this->hasMany(Company::class);
    }
}
