<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Skill $skill)
    {
        
        $skills = Skill::all();
        if (Gate::allows('create-hero')) {
            return view('skill.index', compact('skills'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Skill $skill)
    {
        $skills = Skill::all();
        if (Gate::allows('create-hero')) {
            return view('skill.create');
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = new Skill();
        $skill->name = $validatedData['name'];
        $skill->save();

        return redirect()->route('skill.index')->with('message', 'Compétence créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Gate::allows('create-hero')) {
            return view('skill.show');
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        if (Gate::allows('create-hero')) {
            return view('skill.edit', compact('skill'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Assignation manuelle des propriétés
        $skill->name = $request->name;

        // Sauvegarde de la compétence
        $skill->save();

        return redirect()->route('skill.index')->with('message', 'Compétence mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Skill $skill)
    {
        $user = auth()->user();
        if ($user->role_id == 2) {
            $skill->delete();
            return redirect()->route('skill.index')->with('message', 'Le skill a été supprimé avec succès.');
        } else {
            return back()->with('message', 'Vous n\'etes pas autorisé à supprimer ce skill.');
        }
    }
}
