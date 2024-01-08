<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Gate::allows('edit-user', $user)) {
            return view('user.edit', compact('user'));
        } else {
            return redirect()->route('hero.index')->with('message', 'Accès non autorisé.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'required|max:40',
            'image' => 'nullable|image|max:2048'
        ]);

        $user->pseudo = $request->input('pseudo');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/profile_images');
            $user->image = basename($imagePath); // Enregistrer uniquement le nom de l'image
        }

        $user->save();

        return back()->with('message', 'Votre profil a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            $user->delete();
            return redirect()->route('home')->with('message', 'Votre compte a bien été supprimé');
        } else {
            return back()->with('message', 'Vous ne pouvez pas supprimer ce compte');
        }
    }
}
