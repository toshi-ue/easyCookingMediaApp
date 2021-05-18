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

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipe/edit', compact('recipe'));
    }
}
