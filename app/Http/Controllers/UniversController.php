<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class UniversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(univers $univers)
    {
        $univers = Univers::all();
        if (Gate::allows('create-hero')) {
            return view('univers.index', compact('univers'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(univers $univers)
    {
        $univers = Univers::all();
        if (Gate::allows('create-hero')) {
            return view('univers.create');
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

        $univers = new Univers();
        $univers->name = $validatedData['name'];
        $univers->save();

        return redirect()->route('univers.index')->with('message', 'Univers créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Gate::allows('create-hero')) {
            return view('univers.show');
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès refusé.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, univers $univers)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Assignation manuelle des propriétés
        $univers->name = $request->name;

        // Sauvegarde de la compétence
        $univers->save();

        return redirect()->route('univers.index')->with('message', 'Univers mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(univers $univers)
    {
        $user = auth()->user();
        if ($user->role_id == 2) {
            try {
                $univers->delete();
                Log::info("Univers supprimé: " . $univers->id);
                return redirect()->route('univers.index')->with('message', 'L\'univers a été supprimé avec succès.');
            } catch (\Exception $e) {
                Log::error("Erreur lors de la suppression de l'univers: " . $e->getMessage());
                return back()->with('message', 'Erreur lors de la suppression de l\'univers.');
            }
        } else {
            return back()->with('message', 'Vous n\'êtes pas autorisé à supprimer cet univers.');
        }
    }

}
