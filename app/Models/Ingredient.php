<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeIngredient;

class Ingredient extends Model
{
    protected $table = 'ingredient';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name'];
    use HasFactory;

    public function Recipe()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredient');
    }

}
