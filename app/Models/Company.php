<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    //
    protected $fillable = [
        'name',
        'contact_info',
        'sector',
        'location',
        'web_url',
        'size',
        'user_id',
    ];


}
