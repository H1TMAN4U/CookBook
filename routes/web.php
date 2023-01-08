<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeIngredientController;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('show',[RecipeController::class,'guest_recipes'], function () {
    return view('show');
});

Route::get('/show-full/{id}',[RecipeController::class,'IDrecipe']);

Route::get('/search',[RecipeController::class,'search']);

// Route::get('/search',[IngredientController::class,'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('recipes', RecipeController::class);

});
// Route::get('recipe',[RecipeController::class,'view']);
// Route::get('ingredients',[IngredientController::class, 'view']);

Route::resource('insertRI',RecipeIngredientController::class);

Route::resource('posts',IngredientController::class);


require __DIR__.'/auth.php';

