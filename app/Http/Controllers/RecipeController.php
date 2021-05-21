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
        $recipes = Recipe::paginate(5);
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
        // $request->merge([
        //     'is_published' => $request->boolean('is_published') ? 1 : 0
        // ]);

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->cookingtools = $request->cookingtools;
        $recipe->description = $request->description;
        $recipe->is_comment_allowed = $request->is_comment_allowed;
        $recipe->is_published = $request->is_published;
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
        if (!empty($request->tool)) {
            $string_tools = implode(",", $request->tool);
        } else {
            $string_tools = null;
        }

        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->cookingtools = $string_tools;
        $recipe->description = $request->description;
        $recipe->is_comment_allowed = $request->is_comment_allowed;
        $recipe->is_published = $request->is_published;
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
