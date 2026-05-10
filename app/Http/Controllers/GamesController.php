<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        return view('games.index');
    }

    public function memoryGame()
    {
        return view('games.memory');
    }

    public function puzzleGame()
    {
        return view('games.puzzle');
    }

    public function matchingGame()
    {
        return view('games.matching');
    }

    public function dragAndDropGame()
    {
        return view('games.drag-and-drop');
    }
} 