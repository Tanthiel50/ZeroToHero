<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\User;
use App\Models\Skill;
use App\Models\univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::with('skills')->get();

        return view('hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Skill $skill, univers $univers)
    {
        $skills = Skill::all(); 
        $universes = Univers::all(); 
        $heroes = Hero::all();

        if (Gate::allows('create-hero')) {
            return view('hero.create', compact('skills', 'universes'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données reçues
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'gender' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'description' => 'required|string',
            'univers_id' => 'required|exists:univers,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skill,id'
        ]);

        // Création d'une nouvelle instance de Hero
        $hero = new Hero();
        $hero->name = $validatedData['name'];
        $hero->image = $validatedData['image'];
        $hero->gender = $validatedData['gender'];
        $hero->species = $validatedData['species'];
        $hero->description = $validatedData['description'];
        $hero->univers_id = $validatedData['univers_id'];

        // Sauvegarde de l'instance Hero
        $hero->save();

        // Attachement des compétences si elles existent
        if (!empty($validatedData['skills']) && is_array($validatedData['skills'])) {
            $hero->skills()->attach($validatedData['skills']);
        }

        // Redirection vers la page d'index des héros
        return redirect()->route('hero.index')->with('message', 'Héros créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Hero $hero, User $user)
    {
        $user = auth()->user();
        $hero->load('skills');
        return view('hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        $skills = Skill::all(); // Récupérez toutes les compétences
        $universes = Univers::all(); // Récupérez tous les univers

        if (Gate::allows('edit-hero')) {
            return view('hero.edit', compact('hero', 'skills', 'universes'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero, User $user)
    {
        $user = auth()->user();
        if ($user->role_id == 2) {
            $hero->delete();
            return redirect()->route('hero.index')->with('message', 'Le hero a été supprimé avec succès.');
        } else {
            return back()->with('message', 'Vous n\'etes pas autorisé à supprimer ce post.');
        }
    }
}
