<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;


class RecipeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role->name == 'admin') {
            $recipes = Recipe::with('user')->get();
        } else {
            $recipes = Recipe::where('user_id', $user->id)->get();
        }

        return view('cruds.recipes', compact('recipes'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'proteina' => 'required|numeric',
            'carbohidratos' => 'required|numeric',
            'verduras' => 'required|numeric',
        ]);

        $recipe = new Recipe();

        $recipe->name = $request->name;
        $recipe->proteina = $request->proteina;
        $recipe->carbohidratos = $request->carbohidratos;
        $recipe->verduras = $request->verduras;
        $recipe->user_id = auth()->id();

        $recipe->save();

        return redirect()->route('recipes.index');
    }   

    public function edit(Recipe $recipe)
    {
        if (auth()->user()->role->name != 'admin' && $recipe->user_id != auth()->id()) {
            abort(403);
        }

        return view('cruds.recipes_edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        if (auth()->user()->role->name != 'admin' && $recipe->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'proteina' => 'required|numeric',
            'carbohidratos' => 'required|numeric',
            'verduras' => 'required|numeric',
        ]);

        $recipe->name = $request->name;
        $recipe->proteina = $request->proteina;
        $recipe->carbohidratos = $request->carbohidratos;
        $recipe->verduras = $request->verduras;
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        if (auth()->user()->role->name != 'admin' && $recipe->user_id != auth()->id()) {
            abort(403);
        }

        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
