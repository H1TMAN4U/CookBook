<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Recipe;
 
class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredient';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    protected $fillable =
    [
    'recipe_id',
    'ingredient_id',
    ];
    use HasFactory;

    // public function getRecipe()
    // {
    //   return $this->belongsToMany('recipe_id'); // assuming user_id and task_id as fk
    // }
    
    // // User model
    // public function getIngredient()
    // {
    //   return $this->belongsToMany( 'ingredient_id');
    // }
}


