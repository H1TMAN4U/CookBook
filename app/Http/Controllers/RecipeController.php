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
        $data=Recipe::latest()->paginate(5);
        $recipe=Recipe::with('getCategory')->where("users_id",$id)->get();

        return view("recipes.user-recipes.myrecipes",["recipe"=>$recipe], compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('recipes.user-recipes.create',['recipe'=>$recipe, "category"=>$category, "ingredient"=>$ingredient,"recipe_ingredient"=>$RecipeIngredient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'student_name'          =>  'required',
        //     'student_email'         =>  'required|email|unique:students',
        //     'student_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        // ]);
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
    public function show(Recipe $recipe)
    {
        return view('recipes.user-recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $recipe= Recipe::all();
        $category=Category::all();
        $ingredient=Ingredient::all();
        return view('recipes.user-recipes.create',['recipe'=>$recipe, "category"=>$category, "ingredient"=>$ingredient],compact('recipe'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        // $request->validate([
        //     'student_name'      =>  'required',
        //     'student_email'     =>  'required|email',
        //     'student_image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        // ]);

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
        $category=Category::all();
        $data=Recipe::with('getCategory')->get();

        $data = Recipe::latest()->paginate(5);
        return view('recipes.guest-recipes.show',['recipe'=>$recipe,"category"=>$category, "ingredient"=>$ingredient], compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function IDrecipe($id)
    {
        $RecipeData= Recipe::find($id);
        $Ingredient= Ingredient::orderBy('name', 'asc')->get();

        $category=Recipe::with('getCategory')->get();
        $data = DB::table("recipe")->where('id',$id)->get();
        $ingredient = Ingredient::all();
        return view("recipes.guest-recipes.show-full",["recipes"=>$data,"ingredient"=>$ingredient,"category"=>$category], compact('data','RecipeData', 'Ingredient'));
    }
    public function search()
    {
        $search_text=$_GET["query"];
        $ingredients = Ingredient::where('name','LIKE', '%'.$search_text.'%')->get();
        $recipe = Recipe::where('name','LIKE', '%'.$search_text.'%')->get();
        $category = Category::where('name','LIKE', '%'.$search_text.'%')->get();

        return view('recipes.search',["ingredients"=>$recipe, "recipe"=>$recipe, "category"=>$recipe], compact('recipe','category', 'ingredients'));
    }
    // public function UserRecipes()
    //     {
    //     // $recipe = Recipe::find($id);
    //     // dd($recipe);
    //     // return view('recipes.user-recipes.myrecipes')->with('recipe', $recipe);
    //     $id=Auth::user()->id;
    //     $data=Recipe::with('getCategory')->get();
    //     $data=Recipe::latest()->paginate(5);
    //     // $data=Recipe::all();
    //     // return view('recipe',['data'=>$data]);

    //     // $category=Category::all();
    //     $recipe=Recipe::where("users_id",$id)->get();
    //     return view("recipes.user-recipes.myrecipes",["data"=>$data,"recipe"=>$recipe], compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }


}
