<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Category;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index()
    {
        $elements = Element::with('category')->get();
        return view('elements.index', compact('elements'));
    }

    public function show(Element $element)
    {
        return view('elements.show', compact('element'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('elements.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio_fr' => 'nullable|mimes:mp3,wav|max:2048',
            'audio_ar' => 'nullable|mimes:mp3,wav|max:2048',
            'audio_en' => 'nullable|mimes:mp3,wav|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/elements'), $imageName);
            $data['image'] = 'images/elements/' . $imageName;
        }

        if ($request->hasFile('audio_fr')) {
            $audio = $request->file('audio_fr');
            $audioName = time() . '_fr.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_fr'] = 'audios/elements/' . $audioName;
        }

        if ($request->hasFile('audio_ar')) {
            $audio = $request->file('audio_ar');
            $audioName = time() . '_ar.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_ar'] = 'audios/elements/' . $audioName;
        }

        if ($request->hasFile('audio_en')) {
            $audio = $request->file('audio_en');
            $audioName = time() . '_en.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_en'] = 'audios/elements/' . $audioName;
        }

        Element::create($data);

        return redirect()->route('elements.index')
            ->with('success', 'Élément créé avec succès.');
    }

    public function edit(Element $element)
    {
        $categories = Category::all();
        return view('elements.edit', compact('element', 'categories'));
    }

    public function update(Request $request, Element $element)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio_fr' => 'nullable|mimes:mp3,wav|max:2048',
            'audio_ar' => 'nullable|mimes:mp3,wav|max:2048',
            'audio_en' => 'nullable|mimes:mp3,wav|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            if ($element->image && file_exists(public_path($element->image))) {
                unlink(public_path($element->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/elements'), $imageName);
            $data['image'] = 'images/elements/' . $imageName;
        }

        if ($request->hasFile('audio_fr')) {
            if ($element->audio_fr && file_exists(public_path($element->audio_fr))) {
                unlink(public_path($element->audio_fr));
            }
            
            $audio = $request->file('audio_fr');
            $audioName = time() . '_fr.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_fr'] = 'audios/elements/' . $audioName;
        }

        if ($request->hasFile('audio_ar')) {
            if ($element->audio_ar && file_exists(public_path($element->audio_ar))) {
                unlink(public_path($element->audio_ar));
            }
            
            $audio = $request->file('audio_ar');
            $audioName = time() . '_ar.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_ar'] = 'audios/elements/' . $audioName;
        }

        if ($request->hasFile('audio_en')) {
            if ($element->audio_en && file_exists(public_path($element->audio_en))) {
                unlink(public_path($element->audio_en));
            }
            
            $audio = $request->file('audio_en');
            $audioName = time() . '_en.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audios/elements'), $audioName);
            $data['audio_en'] = 'audios/elements/' . $audioName;
        }

        $element->update($data);

        return redirect()->route('elements.index')
            ->with('success', 'Élément mis à jour avec succès.');
    }

    public function destroy(Element $element)
    {
        if ($element->image && file_exists(public_path($element->image))) {
            unlink(public_path($element->image));
        }
        
        if ($element->audio_fr && file_exists(public_path($element->audio_fr))) {
            unlink(public_path($element->audio_fr));
        }
        
        if ($element->audio_ar && file_exists(public_path($element->audio_ar))) {
            unlink(public_path($element->audio_ar));
        }
        
        if ($element->audio_en && file_exists(public_path($element->audio_en))) {
            unlink(public_path($element->audio_en));
        }
        
        $element->delete();

        return redirect()->route('elements.index')
            ->with('success', 'Élément supprimé avec succès.');
    }
}
