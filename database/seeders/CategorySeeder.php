<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Level;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Catégories Préscolaire
        $prescolaire = Level::where('type', 'prescolaire')->first();
        
        $prescolaireCategories = [
            [
                'name_fr' => 'Alphabet',
                'name_ar' => 'الحروف الأبجدية',
                'name_en' => 'Alphabet',
                'description_fr' => 'Apprends les lettres en t\'amusant',
                'description_ar' => 'تعلم الحروف بطريقة ممتعة',
                'description_en' => 'Learn letters while having fun',
                'icon' => '📚',
                'color' => '#FF6B6B'
            ],
            [
                'name_fr' => 'Chiffres',
                'name_ar' => 'الأرقام',
                'name_en' => 'Numbers',
                'description_fr' => 'Découvre les nombres et le comptage',
                'description_ar' => 'اكتشف الأرقام والعد',
                'description_en' => 'Discover numbers and counting',
                'icon' => '🔢',
                'color' => '#4ECDC4'
            ],
            [
                'name_fr' => 'Couleurs',
                'name_ar' => 'الألوان',
                'name_en' => 'Colors',
                'description_fr' => 'Explore le monde des couleurs',
                'description_ar' => 'استكشف عالم الألوان',
                'description_en' => 'Explore the world of colors',
                'icon' => '🎨',
                'color' => '#FFD93D'
            ],
            [
                'name_fr' => 'Formes',
                'name_ar' => 'الأشكال',
                'name_en' => 'Shapes',
                'description_fr' => 'Découvre les différentes formes',
                'description_ar' => 'اكتشف الأشكال المختلفة',
                'description_en' => 'Discover different shapes',
                'icon' => '⭐',
                'color' => '#6C5CE7'
            ]
        ];

        foreach ($prescolaireCategories as $category) {
            $prescolaire->categories()->create($category);
        }

        // Catégories Primaire
        $primaire = Level::where('type', 'primaire')->first();
        
        $primaireCategories = [
            [
                'name_fr' => 'Moyens de Transport',
                'name_ar' => 'وسائل النقل',
                'name_en' => 'Transportation',
                'description_fr' => 'Découvre les différents moyens de transport',
                'description_ar' => 'اكتشف وسائل النقل المختلفة',
                'description_en' => 'Discover different means of transportation',
                'icon' => '🚗',
                'color' => '#FF6B6B'
            ],
            [
                'name_fr' => 'Le Corps',
                'name_ar' => 'جسم الإنسان',
                'name_en' => 'The Body',
                'description_fr' => 'Apprends les parties du corps humain',
                'description_ar' => 'تعلم أجزاء جسم الإنسان',
                'description_en' => 'Learn the parts of human body',
                'icon' => '👤',
                'color' => '#4ECDC4'
            ],
            [
                'name_fr' => 'Fournitures Scolaires',
                'name_ar' => 'الأدوات المدرسية',
                'name_en' => 'School Supplies',
                'description_fr' => 'Découvre le matériel scolaire',
                'description_ar' => 'اكتشف الأدوات المدرسية',
                'description_en' => 'Discover school supplies',
                'icon' => '✏️',
                'color' => '#FFD93D'
            ],
            [
                'name_fr' => 'Opérations Mathématiques',
                'name_ar' => 'العمليات الحسابية',
                'name_en' => 'Mathematical Operations',
                'description_fr' => 'Entraîne-toi aux calculs',
                'description_ar' => 'تدرب على العمليات الحسابية',
                'description_en' => 'Practice calculations',
                'icon' => '🔢',
                'color' => '#6C5CE7'
            ],
            [
                'name_fr' => 'Animaux',
                'name_ar' => 'الحيوانات',
                'name_en' => 'Animals',
                'description_fr' => 'Découvre le monde des animaux',
                'description_ar' => 'اكتشف عالم الحيوانات',
                'description_en' => 'Discover the world of animals',
                'icon' => '🦁',
                'color' => '#FF9F43'
            ],
            [
                'name_fr' => 'Jeux de Réflexion',
                'name_ar' => 'ألعاب التفكير',
                'name_en' => 'Thinking Games',
                'description_fr' => 'Développe ta logique',
                'description_ar' => 'طور مهارات التفكير',
                'description_en' => 'Develop your logic',
                'icon' => '🧩',
                'color' => '#00B894'
            ],
            [
                'name_fr' => 'Fruits',
                'name_ar' => 'الفواكه',
                'name_en' => 'Fruits',
                'description_fr' => 'Apprends à connaître les fruits',
                'description_ar' => 'تعرف على الفواكه',
                'description_en' => 'Learn about fruits',
                'icon' => '🍎',
                'color' => '#E84393'
            ],
            [
                'name_fr' => 'Légumes',
                'name_ar' => 'الخضروات',
                'name_en' => 'Vegetables',
                'description_fr' => 'Découvre les différents légumes',
                'description_ar' => 'اكتشف الخضروات المختلفة',
                'description_en' => 'Discover different vegetables',
                'icon' => '🥕',
                'color' => '#55EFC4'
            ]
        ];

        foreach ($primaireCategories as $category) {
            $primaire->categories()->create($category);
        }
    }
} 