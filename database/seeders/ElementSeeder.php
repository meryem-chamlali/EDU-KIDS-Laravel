<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Element;

class ElementSeeder extends Seeder
{
    public function run()
    {
        // Catégorie Alphabet
        $alphabetCategory = Category::where('name_fr', 'Alphabet')->first();
        if ($alphabetCategory) {
            $alphabetElements = [
                [
                    'title_fr' => 'La lettre A',
                    'title_ar' => 'حرف الألف',
                    'title_en' => 'Letter A',
                    'description_fr' => 'A comme Avion',
                    'description_ar' => 'أ مثل أرنب',
                    'description_en' => 'A for Airplane',
                    'image' => 'elements/alphabet/a.png',
                    'audio_fr' => 'audio/fr/alphabet/a.mp3',
                    'audio_ar' => 'audio/ar/alphabet/a.mp3',
                    'audio_en' => 'audio/en/alphabet/a.mp3'
                ],
                [
                    'title_fr' => 'La lettre B',
                    'title_ar' => 'حرف الباء',
                    'title_en' => 'Letter B',
                    'description_fr' => 'B comme Ballon',
                    'description_ar' => 'ب مثل بطة',
                    'description_en' => 'B for Ball',
                    'image' => 'elements/alphabet/b.png',
                    'audio_fr' => 'audio/fr/alphabet/b.mp3',
                    'audio_ar' => 'audio/ar/alphabet/b.mp3',
                    'audio_en' => 'audio/en/alphabet/b.mp3'
                ],
                [
                    'title_fr' => 'La lettre C',
                    'title_ar' => 'حرف التاء',
                    'title_en' => 'Letter C',
                    'description_fr' => 'C comme Chat',
                    'description_ar' => 'ت مثل تفاحة',
                    'description_en' => 'C for Cat',
                    'image' => 'elements/alphabet/c.png',
                    'audio_fr' => 'audio/fr/alphabet/c.mp3',
                    'audio_ar' => 'audio/ar/alphabet/c.mp3',
                    'audio_en' => 'audio/en/alphabet/c.mp3'
                ],
                // Ajoutez les autres lettres de la même manière
            ];

            foreach ($alphabetElements as $element) {
                $alphabetCategory->elements()->create($element);
            }
        }

        // Exemple pour la catégorie Chiffres
        $chiffresCategory = Category::where('name_fr', 'Chiffres')->first();
        if ($chiffresCategory) {
            $elements = [
                [
                    'title_fr' => 'Le chiffre 1',
                    'title_ar' => 'الرقم ١',
                    'title_en' => 'Number 1',
                    'description_fr' => 'Apprends à compter : un',
                    'description_ar' => 'تعلم العد: واحد',
                    'description_en' => 'Learn to count: one',
                    'image' => 'storage/elements/numbers/1.png',
                    'audio_fr' => 'storage/audio/fr/1.mp3',
                    'audio_ar' => 'storage/audio/ar/1.mp3',
                    'audio_en' => 'storage/audio/en/1.mp3'
                ],
                // Ajoutez d'autres chiffres ici
            ];

            foreach ($elements as $element) {
                $chiffresCategory->elements()->create($element);
            }
        }

        // Exemple pour la catégorie Animaux
        $animauxCategory = Category::where('name_fr', 'Animaux')->first();
        if ($animauxCategory) {
            $elements = [
                [
                    'title_fr' => 'Lion',
                    'title_ar' => 'أسد',
                    'title_en' => 'Lion',
                    'description_fr' => 'Le roi de la jungle',
                    'description_ar' => 'ملك الغابة',
                    'description_en' => 'The king of the jungle',
                    'image' => 'storage/elements/animals/lion.png',
                    'audio_fr' => 'storage/audio/fr/lion.mp3',
                    'audio_ar' => 'storage/audio/ar/lion.mp3',
                    'audio_en' => 'storage/audio/en/lion.mp3'
                ],
                // Ajoutez d'autres animaux ici
            ];

            foreach ($elements as $element) {
                $animauxCategory->elements()->create($element);
            }
        }

        // Continuez avec d'autres catégories...
    }
} 