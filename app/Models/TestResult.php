<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestResult extends Model
{
    protected $fillable = [
        'id_pasien',
        'total_score',
        'condition_id',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'id_pasien', 'id_pasien');
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }
}
