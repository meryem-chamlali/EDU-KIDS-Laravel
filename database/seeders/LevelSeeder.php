<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            [
                'name' => 'Primaire',
                'name_ar' => 'الابتدائي',
                'name_en' => 'Primary',
                'description' => 'Niveau primaire pour les enfants',
                'description_ar' => 'المستوى الابتدائي للأطفال',
                'description_en' => 'Primary level for children',
                'type' => 'primaire'
            ],
            [
                'name' => 'Préscolaire',
                'name_ar' => 'ما قبل المدرسة',
                'name_en' => 'Preschool',
                'description' => 'Niveau préscolaire pour les jeunes enfants',
                'description_ar' => 'مرحلة ما قبل المدرسة للأطفال الصغار',
                'description_en' => 'Preschool level for young children',
                'type' => 'prescolaire'
            ]
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
} 