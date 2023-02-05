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
}


