<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conditions = [
            [
                'nama_kondisi' => 'Sangat Baik',
                'min_score' => 0,
                'max_score' => 12,
                'deskripsi' => 'Kondisi mental sangat baik. Anda tidak menunjukkan gejala depresi atau kecemasan yang signifikan.',
            ],
            [
                'nama_kondisi' => 'Ringan',
                'min_score' => 13,
                'max_score' => 24,
                'deskripsi' => 'Gejala ringan dan masih wajar. Cobalah untuk menjaga kesehatan mental dengan istirahat yang cukup dan aktivitas positif.',
            ],
            [
                'nama_kondisi' => 'Sedang',
                'min_score' => 25,
                'max_score' => 36,
                'deskripsi' => 'Perlu perhatian lebih. Pertimbangkan untuk berbagi perasaan dengan teman, keluarga, atau mencari konsultasi profesional.',
            ],
            [
                'nama_kondisi' => 'Cukup Berat',
                'min_score' => 37,
                'max_score' => 48,
                'deskripsi' => 'Mulai mengganggu aktivitas sehari-hari. Sangat direkomendasikan untuk berkonsultasi dengan psikolog atau konselor profesional.',
            ],
            [
                'nama_kondisi' => 'Berat',
                'min_score' => 49,
                'max_score' => 60,
                'deskripsi' => 'Disarankan mencari bantuan profesional segera. Hubungi psikiater atau lembaga kesehatan mental untuk mendapatkan penanganan yang tepat.',
            ],
        ];

        foreach ($conditions as $condition) {
            Condition::create($condition);
        }
    }
}
