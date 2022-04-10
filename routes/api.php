<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\RecipelistController;
use App\Http\Controllers\API\FoodieController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::prefix('foodie')->group(function () {
    Route::get('/', [FoodieController::class, 'getAll']);
    Route::post('/', [FoodieController::class, 'create']);
    Route::delete('/{id}', [FoodieController::class, 'delete']);
    Route::get('/{id}', [FoodieController::class, 'get']);
    Route::put('/{id}', [FoodieController::class, 'update']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('recipes/{id}', [RecipesController::class, 'recipes']);
    Route::post('addrecipes/{id}', [RecipesController::class, 'addRecipes']);
    Route::delete('deleterecipes/{id}', [RecipesController::class, 'deleteRecipe']);

    Route::get('recipelist/{id}', [RecipelistController::class, 'userList']);
    Route::post('createlist/{id}', [RecipelistController::class, 'createRecipeList']);
    Route::delete('deletelist/{id}', [RecipelistController::class, 'deleteRecipeList']);

    Route::post('logout', [AuthController::class, 'logout']);
});
