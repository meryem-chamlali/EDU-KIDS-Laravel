<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nom' => 'Alphabet', 'description' => 'Apprends les lettres de A à Z en t’amusant ! 🎈'],
            ['nom' => 'Chiffres', 'description' => 'Découvre les chiffres de 1 à 10 avec des jeux ! 🔢'],
            ['nom' => 'Couleurs', 'description' => 'Explore un arc-en-ciel de jolies couleurs ! 🌈'],
            ['nom' => 'Formes', 'description' => 'Découvre les formes géométriques rigolotes ! 🔷']
        ];

        foreach ($categories as $data) {
            Categorie::create($data);
        }
    }
}
