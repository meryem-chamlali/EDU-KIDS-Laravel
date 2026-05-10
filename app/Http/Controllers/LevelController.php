<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/levels'), $imageName);
            $data['image'] = 'images/levels/' . $imageName;
        }

        Level::create($data);

        return redirect()->route('levels.index')
            ->with('success', 'Niveau créé avec succès.');
    }

    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($level->image && file_exists(public_path($level->image))) {
                unlink(public_path($level->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/levels'), $imageName);
            $data['image'] = 'images/levels/' . $imageName;
        }

        $level->update($data);

        return redirect()->route('levels.index')
            ->with('success', 'Niveau mis à jour avec succès.');
    }

    public function destroy(Level $level)
    {
        if ($level->image && file_exists(public_path($level->image))) {
            unlink(public_path($level->image));
        }
        
        $level->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Niveau supprimé avec succès.');
    }
}
