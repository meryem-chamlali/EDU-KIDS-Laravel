<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShapesController extends Controller
{
    public function index()
    {
        $shapes = [
            ['name' => 'cercle', 'image' => 'cercle.png'],
            ['name' => 'carre', 'image' => 'carre.png'],
            ['name' => 'triangle', 'image' => 'triangle.png'],
            ['name' => 'rectangle', 'image' => 'rectangle.png'],
            ['name' => 'losange', 'image' => 'losange.png'],
            ['name' => 'trapeze', 'image' => 'trapeze.png'],
            ['name' => 'parallelogramme', 'image' => 'parallelogramme.png'],
            ['name' => 'pentagone', 'image' => 'pentagone.png'],
            ['name' => 'hexagone', 'image' => 'hexagone.png'],
            ['name' => 'octogone', 'image' => 'octogone.png'],
            ['name' => 'ellipse', 'image' => 'ellipse.png']
        ];

        return view('categories.shapes', compact('shapes'));
    }

    public function quiz()
    {
        $shapes = [
            ['name' => 'cercle', 'image' => 'cercle.png'],
            ['name' => 'carre', 'image' => 'carre.png'],
            ['name' => 'triangle', 'image' => 'triangle.png'],
            ['name' => 'rectangle', 'image' => 'rectangle.png'],
            ['name' => 'losange', 'image' => 'losange.png'],
            ['name' => 'trapeze', 'image' => 'trapeze.png'],
            ['name' => 'parallelogramme', 'image' => 'parallelogramme.png'],
            ['name' => 'pentagone', 'image' => 'pentagone.png'],
            ['name' => 'hexagone', 'image' => 'hexagone.png'],
            ['name' => 'octogone', 'image' => 'octogone.png'],
            ['name' => 'ellipse', 'image' => 'ellipse.png']
        ];

        return view('categories.shapes-quiz', compact('shapes'));
    }

    public function playSound($shape)
    {
        $audioPath = public_path("audios/shapes/{$shape}.mp3");
        
        if (file_exists($audioPath)) {
            return response()->file($audioPath);
        }
        
        return response()->json(['error' => 'Audio file not found'], 404);
    }
} 