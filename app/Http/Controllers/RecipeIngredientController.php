<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $category=Category::all();
        $ingredient=Ingredient::all();
        $recipe= Recipe::all();
        return view("recipes.user-recipes.myrecipes",
        [
        "recipe"=>$recipe,
        "ingredient"=>$ingredient,
        "category"=>$category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe= Recipe::all();
        // $getRecipe=Recipe::with('getRecipe')->get();
        // $getIngredient=Recipe::with('getIngredient')->get();

        $category=Category::all();
        $ingredient=Ingredient::all();
        $RecipeIngredient=RecipeIngredient::all();
        return view('recipes.user-recipes.myrecipes',
        [
        'recipe'=>$recipe,
        "category"=>$category,
        "ingredient"=>$ingredient,
        "recipe_ingredient"=>$RecipeIngredient
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
        return redirect()->route('recipes.create')->with('success', 'recipe Added successfully.');
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
