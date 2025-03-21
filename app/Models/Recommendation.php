<?php

namespace App\Models;

use App\Enums\Origin;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $table = 'recommendations';

    //
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'url',
        'origin',
    ];

    
    protected $casts = [
        'origin' => Origin::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
