<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateAlphabetResources extends Command
{
    protected $signature = 'generate:alphabet-resources';
    protected $description = 'Génère les ressources pour la catégorie Alphabet';

    private $letters = [
        'A' => ['fr' => 'Avion', 'en' => 'Airplane', 'ar' => 'أرنب'],
        'B' => ['fr' => 'Ballon', 'en' => 'Ball', 'ar' => 'بطة'],
        'C' => ['fr' => 'Chat', 'en' => 'Cat', 'ar' => 'تفاحة'],
        'D' => ['fr' => 'Dauphin', 'en' => 'Dolphin', 'ar' => 'دب'],
        'E' => ['fr' => 'Éléphant', 'en' => 'Elephant', 'ar' => 'أرنب'],
        'F' => ['fr' => 'Fleur', 'en' => 'Flower', 'ar' => 'فيل'],
        // ... autres lettres
    ];

    public function handle()
    {
        $this->info('Création des dossiers pour les ressources...');

        // Création des dossiers
        $directories = [
            'elements/alphabet',
            'elements/alphabet/letters',
            'elements/alphabet/objects',
            'audio/fr/alphabet',
            'audio/ar/alphabet',
            'audio/en/alphabet'
        ];

        foreach ($directories as $dir) {
            Storage::disk('public')->makeDirectory($dir);
            $this->info("Dossier créé : {$dir}");
        }

        // Création des fichiers placeholder
        foreach ($this->letters as $letter => $words) {
            $this->createPlaceholders($letter, $words);
        }

        $this->info('Génération des ressources terminée !');
        $this->info('Veuillez ajouter manuellement les images et fichiers audio dans les dossiers correspondants :');
        $this->info('- public/storage/elements/alphabet/letters/ (pour les images des lettres)');
        $this->info('- public/storage/elements/alphabet/objects/ (pour les images des objets)');
        $this->info('- public/storage/audio/[fr|ar|en]/alphabet/ (pour les fichiers audio)');
    }

    private function createPlaceholders($letter, $words)
    {
        $letter = strtolower($letter);
        
        // Création des fichiers placeholder pour les images
        Storage::disk('public')->put(
            "elements/alphabet/letters/{$letter}.txt",
            "Placer ici l'image de la lettre {$letter}"
        );

        foreach ($words as $lang => $word) {
            // Placeholder pour l'image de l'objet
            Storage::disk('public')->put(
                "elements/alphabet/objects/{$letter}_{$lang}.txt",
                "Placer ici l'image de : {$word}"
            );

            // Placeholder pour l'audio
            Storage::disk('public')->put(
                "audio/{$lang}/alphabet/{$letter}.txt",
                "Placer ici l'audio pour : {$word}"
            );
        }

        $this->info("Placeholders créés pour la lettre {$letter}");
    }
} 