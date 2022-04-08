<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;

class RecipesController extends Controller
{
    public function getRecipes($id)
    {
        $check = Recipes::where('recipe_lists_id', $id)->get();
        $res = [
            'status' => true,
            'message' => $check
        ];

        return response($res, 201);
    }

    public function addRecipes(Request $request, $id)
    {
        $check = Recipes::where('recipe_id', $request['recipe_id'])->where('recipe_lists_id', $id);

        if(!$check->count()) {
            $exist = Recipes::create([
                'recipe_id' => $request['recipe_id'],
                'title' => $request['title'],
                'recipe_lists_id' => $id,
            ]);

            $res = [
                'status' => true,
                'message' => 'recipe added'
            ];

        return response($res, 201);

        } else {
            $res = [
                'status' => false,
                'message' => 'recipe already added to the list'
            ];

            return response($res, 404);
        }
    }

    public function deleteRecipe($id)
    {
        $findrecipe = Recipes::find($id);
        $findrecipe->delete();

        $res = [
            'status' => true,
            'message' => 'recipe is now deleted'
        ];

        return response($res, 201);
    }

}
