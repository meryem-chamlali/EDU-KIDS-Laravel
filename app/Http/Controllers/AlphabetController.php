<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlphabetController extends Controller
{
    public function index()
    {
        $letters = [
            [
                'letter' => 'A',
                'word_fr' => 'Avion',
                'image' => 'storage/elements/alphabet/letters/a.png',
                'audio_fr' => 'storage/audio/fr/alphabet/a.mp3'
            ],
            [
                'letter' => 'B',
                'word_fr' => 'Ballon',
                'image' => 'storage/elements/alphabet/letters/b.png',
                'audio_fr' => 'storage/audio/fr/alphabet/b.mp3'
            ],
            [
                'letter' => 'C',
                'word_fr' => 'Chat',
                'image' => 'storage/elements/alphabet/letters/c.png',
                'audio_fr' => 'storage/audio/fr/alphabet/c.mp3'
            ],
            [
                'letter' => 'D',
                'word_fr' => 'Dauphin',
                'image' => 'storage/elements/alphabet/letters/d.png',
                'audio_fr' => 'storage/audio/fr/alphabet/d.mp3'
            ],
            [
                'letter' => 'E',
                'word_fr' => 'Éléphant',
                'image' => 'storage/elements/alphabet/letters/e.png',
                'audio_fr' => 'storage/audio/fr/alphabet/e.mp3'
            ],
            [
                'letter' => 'F',
                'word_fr' => 'Fleur',
                'image' => 'storage/elements/alphabet/letters/f.png',
                'audio_fr' => 'storage/audio/fr/alphabet/f.mp3'
            ],
            [
                'letter' => 'G',
                'word_fr' => 'Girafe',
                'image' => 'storage/elements/alphabet/letters/g.png',
                'audio_fr' => 'storage/audio/fr/alphabet/g.mp3'
            ],
            [
                'letter' => 'H',
                'word_fr' => 'Hélicoptère',
                'image' => 'storage/elements/alphabet/letters/h.png',
                'audio_fr' => 'storage/audio/fr/alphabet/h.mp3'
            ],
            [
                'letter' => 'I',
                'word_fr' => 'Igloo',
                'image' => 'storage/elements/alphabet/letters/i.png',
                'audio_fr' => 'storage/audio/fr/alphabet/i.mp3'
            ],
            [
                'letter' => 'J',
                'word_fr' => 'Jardin',
                'image' => 'storage/elements/alphabet/letters/j.png',
                'audio_fr' => 'storage/audio/fr/alphabet/j.mp3'
            ],
            [
                'letter' => 'K',
                'word_fr' => 'Kangourou',
                'image' => 'storage/elements/alphabet/letters/k.png',
                'audio_fr' => 'storage/audio/fr/alphabet/k.mp3'
            ],
            [
                'letter' => 'L',
                'word_fr' => 'Lion',
                'image' => 'storage/elements/alphabet/letters/l.png',
                'audio_fr' => 'storage/audio/fr/alphabet/l.mp3'
            ],
            [
                'letter' => 'M',
                'word_fr' => 'Maison',
                'image' => 'storage/elements/alphabet/letters/m.png',
                'audio_fr' => 'storage/audio/fr/alphabet/m.mp3'
            ],
            [
                'letter' => 'N',
                'word_fr' => 'Nid',
                'image' => 'storage/elements/alphabet/letters/n.png',
                'audio_fr' => 'storage/audio/fr/alphabet/n.mp3'
            ],
            [
                'letter' => 'O',
                'word_fr' => 'Oiseau',
                'image' => 'storage/elements/alphabet/letters/o.png',
                'audio_fr' => 'storage/audio/fr/alphabet/o.mp3'
            ],
            [
                'letter' => 'P',
                'word_fr' => 'Papillon',
                'image' => 'storage/elements/alphabet/letters/p.png',
                'audio_fr' => 'storage/audio/fr/alphabet/p.mp3'
            ],
            [
                'letter' => 'Q',
                'word_fr' => 'Queue',
                'image' => 'storage/elements/alphabet/letters/q.png',
                'audio_fr' => 'storage/audio/fr/alphabet/q.mp3'
            ],
            [
                'letter' => 'R',
                'word_fr' => 'Robot',
                'image' => 'storage/elements/alphabet/letters/r.png',
                'audio_fr' => 'storage/audio/fr/alphabet/r.mp3'
            ],
            [
                'letter' => 'S',
                'word_fr' => 'Soleil',
                'image' => 'storage/elements/alphabet/letters/s.png',
                'audio_fr' => 'storage/audio/fr/alphabet/s.mp3'
            ],
            [
                'letter' => 'T',
                'word_fr' => 'Train',
                'image' => 'storage/elements/alphabet/letters/t.png',
                'audio_fr' => 'storage/audio/fr/alphabet/t.mp3'
            ],
            [
                'letter' => 'U',
                'word_fr' => 'Usine',
                'image' => 'storage/elements/alphabet/letters/u.png',
                'audio_fr' => 'storage/audio/fr/alphabet/u.mp3'
            ],
            [
                'letter' => 'V',
                'word_fr' => 'Vélo',
                'image' => 'storage/elements/alphabet/letters/v.png',
                'audio_fr' => 'storage/audio/fr/alphabet/v.mp3'
            ],
            [
                'letter' => 'W',
                'word_fr' => 'Wagon',
                'image' => 'storage/elements/alphabet/letters/w.png',
                'audio_fr' => 'storage/audio/fr/alphabet/w.mp3'
            ],
            [
                'letter' => 'X',
                'word_fr' => 'Xylophone',
                'image' => 'storage/elements/alphabet/letters/x.png',
                'audio_fr' => 'storage/audio/fr/alphabet/x.mp3'
            ],
            [
                'letter' => 'Y',
                'word_fr' => 'Yacht',
                'image' => 'storage/elements/alphabet/letters/y.png',
                'audio_fr' => 'storage/audio/fr/alphabet/y.mp3'
            ],
            [
                'letter' => 'Z',
                'word_fr' => 'Zèbre',
                'image' => 'storage/elements/alphabet/letters/z.png',
                'audio_fr' => 'storage/audio/fr/alphabet/z.mp3'
            ]
        ];

        return view('categories.alphabet', compact('letters'));
    }

    public function playSound($letter)
    {
        $audioPath = "storage/audio/fr/alphabet/{$letter}.mp3";
        if (file_exists(public_path($audioPath))) {
            return response()->file(public_path($audioPath));
        }
        return response()->json(['error' => 'Audio file not found'], 404);
    }

    public function quiz()
    {
        return view('categories.alphabet-quiz');
    }
} 