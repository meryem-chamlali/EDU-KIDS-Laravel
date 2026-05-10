<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Category;
use App\Models\Element;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $prescolaire = Level::where('type', 'prescolaire')->with('categories')->get();
        $primaire = Level::where('type', 'primaire')->with('categories')->get();
        
        return view('frontend.home', compact('prescolaire', 'primaire'));
    }

    public function prescolaire()
    {
        $categories = [
            [
                'name' => 'Alphabet',
                'icon' => '📚',
                'description' => 'Apprends les lettres en t\'amusant',
                'color' => '#FF6B6B',
                'route' => route('alphabet.index')
            ],
            [
                'name' => 'Chiffres',
                'icon' => '🔢',
                'description' => 'Découvre les nombres et le comptage',
                'color' => '#4ECDC4',
                'route' => route('numbers.index')
            ],
            [
                'name' => 'Couleurs',
                'icon' => '🎨',
                'description' => 'Explore le monde des couleurs',
                'color' => '#FFD93D',
                'route' => route('colors.index')
            ],
            [
                'name' => 'Formes',
                'icon' => '⭐',
                'description' => 'Découvre les différentes formes',
                'color' => '#6C5CE7',
                'route' => route('shapes')
            ],
            [
                'name' => 'Jeux',
                'icon' => '🎮',
                'description' => 'Joue et apprends en même temps',
                'color' => '#FF4757',
                'route' => route('games.index')
            ]
        ];

        return view('frontend.prescolaire', compact('categories'));
    }

    public function primaire()
    {
        $categories = [
            [
                'name' => 'Les Animaux',
                'description' => 'Découvre le monde fascinant des animaux !',
                'icon' => '🦁',
                'color' => '#FF6B6B',
                'route' => route('primaire.animaux')
            ],
            [
                'name' => 'Le Corps Humain',
                'description' => 'Explore et apprends les parties du corps humain.',
                'icon' => '👤',
                'color' => '#4ECDC4',
                'route' => route('primaire.corps')
            ],
            [
                'name' => 'Les Fruits',
                'description' => 'Découvre les délicieux fruits et leurs bienfaits !',
                'icon' => '🍎',
                'color' => '#FF9F43',
                'route' => route('primaire.fruits')
            ],
            [
                'name' => 'Les Légumes',
                'description' => 'Apprends à connaître les légumes nutritifs !',
                'icon' => '🥕',
                'color' => '#2ECC71',
                'route' => route('primaire.legumes')
            ],
            [
                'name' => 'Les Moyens de Transport',
                'description' => 'Explore les différents moyens de transport !',
                'icon' => '🚗',
                'color' => '#45AAF2',
                'route' => route('primaire.transport')
            ],
            [
                'name' => 'Les Fournitures Scolaires',
                'description' => 'Découvre le matériel scolaire !',
                'icon' => '✏️',
                'color' => '#A55EEA',
                'route' => route('primaire.fournitures')
            ]
        ];

        return view('frontend.primaire', compact('categories'));
    }

    public function showCategorie($id)
    {
        $category = Category::with('elements')->findOrFail($id);
        return view('frontend.category', compact('category'));
    }

    public function showElement($id)
    {
        $element = Element::findOrFail($id);
        return view('frontend.element', compact('element'));
    }
}