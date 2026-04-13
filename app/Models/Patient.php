<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $primaryKey = 'id_pasien';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pasien',
        'nama',
        'umur',
        'jenis_kelamin',
        'tanggal_tes',
    ];

    public function testResults(): HasMany
    {
        return $this->hasMany(TestResult::class, 'id_pasien', 'id_pasien');
    }
}
