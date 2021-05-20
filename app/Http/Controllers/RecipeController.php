<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        $deleted_recipes = Recipe::onlyTrashed()->get();
        return view('recipe/index', compact('recipes', 'deleted_recipes'));
    }

    public function create()
    {
        $recipe = new Recipe();

        return view('recipe/create', compact('recipe'));
    }

    public function store(RecipeRequest $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->description = $request->description;
        $recipe->is_comment_allowed = $request->is_comment_allowed;
        $recipe->save();

        return redirect("/recipe");
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

    public function update(RecipeRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->description = $request->description;
        $recipe->is_comment_allowed = $request->is_comment_allowed;
        $recipe->save();

        return redirect("/recipe");
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect("/recipe");
    }

    public function restore($id)
    {
        Recipe::onlyTrashed()->find($id)->restore();

        return redirect("/recipe");
    }
}
