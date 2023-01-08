<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function view()
    //  {
    //      $RecipeData= Recipe::find(35);
    //      $Ingredient= Ingredient::orderBy('name', 'asc')->get();
    //      return view('recipe', compact('RecipeData', 'Ingredient'));
    //  }
    public function index()
    {
        $id=Auth::user()->id;
        // $recipe=Recipe::with('getCategory')->where("users_id",$id)->get();
        $recipe=Recipe::select('id','name', 'img')->where('users_id', $id)->paginate(8);
        return view("recipes.user-recipes.index", compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   
        $recipe=Recipe::all();
        $category=Category::all();
        $ingredient=Ingredient::all();
        return view('recipes.user-recipes.create',
        [
        "category"=>$category,
        "ingredient"=>$ingredient,
        "recipe"=>$recipe
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
        $request->validate([
            'img'=>'required|image:jpg,png,jpeg,svg|max:2048|dimensions:
            in_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        $users_id= Auth::user()->id;
        $file_name = time() . '.' . request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images'), $file_name);
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->instructions = $request->instructions;
        $recipe->img = $file_name;
        $recipe -> category_id = $request->category_id;
        $recipe -> users_id = $users_id;
        $recipe->save();
        return redirect()->route('recipes.index')->with('success', 'recipe Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $RecipeData= Recipe::find($id);
        $Ingredient= Ingredient::orderBy('name', 'asc')->get();
        $category=Recipe::with('getCategory')->get();
        $recipe = DB::table("recipe")->where('id',$id)->get();
        $ingredient = Ingredient::all();
        return view("recipes.user-recipes.show",
        [
        "recipes"=>$recipe,
        "ingredient"=>$ingredient,
        "category"=>$category
        ],
        compact('recipe','RecipeData', 'Ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $category=Category::all();
        return view('recipes.user-recipes.edit',
        ['category'=>$category],compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'img'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:
            min_width=100,min_height=100,max_width=5000,max_height=5000'
        ]);
        $img = $request->hidden_img;
        if($request->img != '')
        {
            $img = time() . '.' . request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images'), $img);
        }
        $recipe = Recipe::find($request->hidden_id);
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->instructions = $request->instructions;
        $recipe->img = $img;
        $recipe->save();
        return redirect()->route('recipes.index')->with('success', 'recipe Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Student Data deleted successfully');
    }
    public function guest_recipes(Recipe $recipe)
    {
        $recipe= Recipe::all();
        $ingredient=Ingredient::all();
        $category=Recipe::with('getCategory')->get();
        $data = Recipe::latest()->paginate(5);
        return view('recipes.guest-recipes.show',
        [
        'recipe'=>$recipe,
        "category"=>$category,
        "ingredient"=>$ingredient
        ],
        compact('data'));    
    }
    public function IDrecipe($id)
    {
        $RecipeData= Recipe::find($id);
        $ingredient= Ingredient::orderBy('name', 'asc')->get();
        $category=Recipe::with('getCategory')->get();
        $data = DB::table("recipe")->where('id',$id)->get();
        $ingredient = Ingredient::all();
        return view("recipes.guest-recipes.show-full",
        [
        "recipes"=>$data,
        "ingredient"=>$ingredient,
        "category"=>$category
        ],
        compact('data','RecipeData', 'ingredient'));
    }
    public function search()
    {
        $data=Recipe::with('getCategory')->get();
        $data = Recipe::latest()->paginate(5);
        $search_text=$_GET["query"];
        $recipe = Recipe::where('name','LIKE', '%'.$search_text.'%')->get();
        return view('recipes.search',
        ["recipe"=>$recipe], compact('recipe','data'));
    }
}
