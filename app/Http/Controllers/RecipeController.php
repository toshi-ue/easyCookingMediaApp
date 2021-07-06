<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $search_keyword = $request->input('search');
        // dd($search_keyword);
        $query = Recipe::query();
        // dd($request);
        if (!empty($search_keyword)) {
            // $query = Recipe::query();
            $query->where('name', 'LIKE', "%" . $search_keyword . "%")
                ->orWhere('cookingtime', 'LIKE', "%" . $search_keyword . "%")
                ->orWhere('description', 'LIKE', "%" . $search_keyword . "%")
                ->orWhere('is_comment_allowed', 'LIKE', "%" . $search_keyword . "%")
                ->orWhere('is_published', 'LIKE', "%" . $search_keyword . "%");
            $recipes = $query->paginate(5);
            $deleted_recipes = Recipe::onlyTrashed()->get();
        } else {
            $recipes = Recipe::paginate(5);
            $deleted_recipes = Recipe::onlyTrashed()->get();
        }

        // $recipes = Recipe::paginate(5);
        // $deleted_recipes = Recipe::onlyTrashed()->get();
        return view('recipe/index', compact('recipes', 'deleted_recipes', 'search_keyword'));
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

        dd($request->main_image);
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->cookingtime = $request->cookingtime;
        $recipe->cookingtools = $request->cookingtools;
        $recipe->description = $request->description;
        $recipe->is_comment_allowed = $request->is_comment_allowed;
        $recipe->is_published = $request->is_published;
        $recipe->main_image = basename($request->main_image->storeAs('public/main_images', date("YmdHis") . '.jpg'));
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
