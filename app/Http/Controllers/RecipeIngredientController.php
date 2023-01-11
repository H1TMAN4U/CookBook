<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $id=Auth::user()->id;   
        $recipe=Recipe::select('id','name', 'img')->where('users_id', $id)->get();
        $ingredient=Ingredient::all();
        return view("recipes.user-recipes.create-ingredients",["ingredient"=>$ingredient], compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe= Recipe::all();
        $ingredient=Ingredient::all();
        return view('recipes.user-recipes.myrecipes',
        [
        'recipe'=>$recipe,
        "ingredient"=>$ingredient
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe= new RecipeIngredient;
        $recipe->recipe_id = $request->recipe_id;
        $recipe->ingredient_id = $request->ingredient_id;
        $recipe->save();
        return redirect()->route('recipe-ingredients.index')->with('success', 'recipe Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeIngredient $recipeIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecipeIngredient  $recipeIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeIngredient $recipeIngredient)
    {
        //
    }
}
