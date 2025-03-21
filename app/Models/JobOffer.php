<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOffer extends Model
{

    protected $table = 'job_offers';

    //
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'requirements',
        'salary',
        'schedule',
        'contract_type',
        'expiration_date',
        'selection_process',
        'organizational_culture',
        'benefits',
    ];

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
