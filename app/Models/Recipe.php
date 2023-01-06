<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
    protected $fillable =
    [
    'id',
    'name',
    'description',
    'instructions',
    'img',
    'category_id'
    ];
    use HasFactory;
    public function getCategory()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
    public function Ingredient()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient');
    }
}
