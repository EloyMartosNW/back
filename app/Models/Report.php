<?php

namespace App\Models;

use App\Enums\ReportType;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    //
    protected $fillable = [
        'user_id',
        'desc',
        'type',
        'target_id',
        'state',
    ];

    
    protected $casts = [
        'type' => ReportType::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
