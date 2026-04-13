<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Condition extends Model
{
    protected $fillable = [
        'nama_kondisi',
        'min_score',
        'max_score',
        'deskripsi',
    ];

    public function testResults(): HasMany
    {
        return $this->hasMany(TestResult::class, 'condition_id');
    }
}
