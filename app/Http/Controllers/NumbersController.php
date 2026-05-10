<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumbersController extends Controller
{
    public function index()
    {
        $numbers = [
            ['number' => 1, 'word' => 'Un', 'image' => 'images/numbers/1.png', 'audio' => 'audio/numbers/1.mp3'],
            ['number' => 2, 'word' => 'Deux', 'image' => 'images/numbers/2.png', 'audio' => 'audio/numbers/2.mp3'],
            ['number' => 3, 'word' => 'Trois', 'image' => 'images/numbers/3.png', 'audio' => 'audio/numbers/3.mp3'],
            ['number' => 4, 'word' => 'Quatre', 'image' => 'images/numbers/4.png', 'audio' => 'audio/numbers/4.mp3'],
            ['number' => 5, 'word' => 'Cinq', 'image' => 'images/numbers/5.png', 'audio' => 'audio/numbers/5.mp3'],
            ['number' => 6, 'word' => 'Six', 'image' => 'images/numbers/6.png', 'audio' => 'audio/numbers/6.mp3'],
            ['number' => 7, 'word' => 'Sept', 'image' => 'images/numbers/7.png', 'audio' => 'audio/numbers/7.mp3'],
            ['number' => 8, 'word' => 'Huit', 'image' => 'images/numbers/8.png', 'audio' => 'audio/numbers/8.mp3'],
            ['number' => 9, 'word' => 'Neuf', 'image' => 'images/numbers/9.png', 'audio' => 'audio/numbers/9.mp3'],
            ['number' => 10, 'word' => 'Dix', 'image' => 'images/numbers/10.png', 'audio' => 'audio/numbers/10.mp3'],
            ['number' => 11, 'word' => 'Onze', 'image' => 'images/numbers/11.png', 'audio' => 'audio/numbers/11.mp3'],
            ['number' => 12, 'word' => 'Douze', 'image' => 'images/numbers/12.png', 'audio' => 'audio/numbers/12.mp3'],
            ['number' => 13, 'word' => 'Treize', 'image' => 'images/numbers/13.png', 'audio' => 'audio/numbers/13.mp3'],
            ['number' => 14, 'word' => 'Quatorze', 'image' => 'images/numbers/14.png', 'audio' => 'audio/numbers/14.mp3'],
            ['number' => 15, 'word' => 'Quinze', 'image' => 'images/numbers/15.png', 'audio' => 'audio/numbers/15.mp3'],
            ['number' => 16, 'word' => 'Seize', 'image' => 'images/numbers/16.png', 'audio' => 'audio/numbers/16.mp3'],
            ['number' => 17, 'word' => 'Dix-sept', 'image' => 'images/numbers/17.png', 'audio' => 'audio/numbers/17.mp3'],
            ['number' => 18, 'word' => 'Dix-huit', 'image' => 'images/numbers/18.png', 'audio' => 'audio/numbers/18.mp3'],
            ['number' => 19, 'word' => 'Dix-neuf', 'image' => 'images/numbers/19.png', 'audio' => 'audio/numbers/19.mp3'],
            ['number' => 20, 'word' => 'Vingt', 'image' => 'images/numbers/20.png', 'audio' => 'audio/numbers/20.mp3'],
        ];

        return view('categories.numbers', compact('numbers'));
    }

    public function quiz()
    {
        $numbers = [];
        for ($i = 1; $i <= 20; $i++) {
            $numbers[] = [
                'number' => $i,
                'word' => $this->getNumberWord($i),
                'image' => "images/numbers/{$i}.png",
                'audio' => "audio/numbers/{$i}.mp3"
            ];
        }

        // Mélanger les nombres pour le quiz
        shuffle($numbers);
        
        // Prendre les 5 premiers nombres pour le quiz
        $quizNumbers = array_slice($numbers, 0, 5);

        return view('categories.numbers-quiz', [
            'numbers' => $quizNumbers
        ]);
    }

    private function getNumberWord($number)
    {
        $words = [
            1 => 'Un', 2 => 'Deux', 3 => 'Trois', 4 => 'Quatre', 5 => 'Cinq',
            6 => 'Six', 7 => 'Sept', 8 => 'Huit', 9 => 'Neuf', 10 => 'Dix',
            11 => 'Onze', 12 => 'Douze', 13 => 'Treize', 14 => 'Quatorze', 
            15 => 'Quinze', 16 => 'Seize', 17 => 'Dix-sept', 18 => 'Dix-huit',
            19 => 'Dix-neuf', 20 => 'Vingt'
        ];
        
        return $words[$number] ?? '';
    }

    public function playSound($number)
    {
        $audioPath = "storage/audio/fr/numbers/{$number}.mp3";
        if (file_exists(public_path($audioPath))) {
            return response()->file(public_path($audioPath));
        }
        return response()->json(['error' => 'Audio file not found'], 404);
    }
} 