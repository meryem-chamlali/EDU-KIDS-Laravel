<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = [
            [
                'name' => 'Rouge',
                'hex' => '#FF0000',
                'image' => 'images/colors/red.png',
                'audio' => 'audio/colors/rouge.mp3',
                'example' => '🍎'
            ],
            [
                'name' => 'Bleu',
                'hex' => '#0000FF',
                'image' => 'images/colors/blue.png',
                'audio' => 'audio/colors/bleu.mp3',
                'example' => '🌊'
            ],
            [
                'name' => 'Jaune',
                'hex' => '#FFFF00',
                'image' => 'images/colors/yellow.png',
                'audio' => 'audio/colors/jaune.mp3',
                'example' => '🌟'
            ],
            [
                'name' => 'Vert',
                'hex' => '#00FF00',
                'image' => 'images/colors/green.png',
                'audio' => 'audio/colors/vert.mp3',
                'example' => '🌿'
            ],
            [
                'name' => 'Orange',
                'hex' => '#FFA500',
                'image' => 'images/colors/orange.png',
                'audio' => 'audio/colors/orange.mp3',
                'example' => '🍊'
            ],
            [
                'name' => 'Rose',
                'hex' => '#FFC0CB',
                'image' => 'images/colors/pink.png',
                'audio' => 'audio/colors/rose.mp3',
                'example' => '🌸'
            ],
            [
                'name' => 'Marron',
                'hex' => '#8B4513',
                'image' => 'images/colors/brown.png',
                'audio' => 'audio/colors/marron.mp3',
                'example' => '🌰'
            ],
            [
                'name' => 'Noir',
                'hex' => '#000000',
                'image' => 'images/colors/black.png',
                'audio' => 'audio/colors/noir.mp3',
                'example' => '⚫'
            ],
            [
                'name' => 'Blanc',
                'hex' => '#FFFFFF',
                'image' => 'images/colors/white.png',
                'audio' => 'audio/colors/blanc.mp3',
                'example' => '⚪'
            ],
            [
                'name' => 'Gris',
                'hex' => '#808080',
                'image' => 'images/colors/gray.png',
                'audio' => 'audio/colors/gris.mp3',
                'example' => '🌫️'
            ],
            [
                'name' => 'Turquoise',
                'hex' => '#40E0D0',
                'image' => 'images/colors/turquoise.png',
                'audio' => 'audio/colors/turquoise.mp3',
                'example' => '💎'
            ],
            [
                'name' => 'Doré',
                'hex' => '#FFD700',
                'image' => 'images/colors/gold.png',
                'audio' => 'audio/colors/dore.mp3',
                'example' => '🏆'
            ],
            [
                'name' => 'Argenté',
                'hex' => '#C0C0C0',
                'image' => 'images/colors/silver.png',
                'audio' => 'audio/colors/argente.mp3',
                'example' => '🥈'
            ]
        ];

        return view('categories.colors', compact('colors'));
    }

    public function quiz()
    {
        return view('categories.colors-quiz');
    }

    public function playSound($color)
    {
        $audioPath = "audio/colors/{$color}.mp3";
        if (file_exists(public_path($audioPath))) {
            return response()->file(public_path($audioPath));
        }
        return response()->json(['error' => 'Audio file not found'], 404);
    }
} 