<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeList;
use App\Models\User;

class RecipelistController extends Controller
{
    public function userList($id)
    {
        $check = RecipeList::where('user_id', $id)->get();
        $res = [
            'status' => true,
            'message' => $check
        ];

        return response($res, 201);
    }

    public function createRecipeList(Request $request, $id)
    {
        $find = User::find($id);
        // $find->delete();

        $validate = $request->validate([
            'title' => 'required|string'
        ]);

        $recipeList = RecipeList::create([
            'title' => $validate['title'],
            'user_id' => $find->id
        ]);

        $res = [
            'status' => true,
            'message' => 'list is now created'
        ];

        return response($res, 201);
    }

    public function deleteRecipeList($id)
    {
        $findlist = RecipeList::find($id);
        $findlist->delete();

        $res = [
            'status' => true,
            'message' => 'list is now deleted'
        ];

        return response($res, 201);
    }

}
