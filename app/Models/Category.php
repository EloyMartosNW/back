<?php

namespace App\Models;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    //
    protected $fillable = [
        'parent_id',
        'name_es',
        'name_en',
        'type',
    ];
    
    protected $casts = [
        'type' => CategoryType::class,
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

}
