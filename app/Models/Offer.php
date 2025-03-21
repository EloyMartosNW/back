<?php

namespace App\Models;

use App\Enums\OfferTypes;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'user_id',
        'name',
        'description',
        'price',
        'sending_cost',
        'type',
        'phone_number',
    ];
    
    protected $casts = [
        'type' => OfferTypes::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
