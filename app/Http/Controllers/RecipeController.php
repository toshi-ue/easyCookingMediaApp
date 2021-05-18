<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipe/index', compact('recipes'));
    }

    public function create()
    {
        $recipe = new Recipe();

        return view('recipe/create', compact('recipe'));
    }

    public function store()
    {
        return view('recipe/edit', compact('recipe'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipe/show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipe/edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->save();

        return redirect("/recipe");
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect("/recipe");
    }
}
