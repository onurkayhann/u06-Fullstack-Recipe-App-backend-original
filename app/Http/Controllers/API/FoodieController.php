<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foodie;
use Log;

class FoodieController extends Controller
{
    public function getAll()
    {
        $data = Foodie::get();
        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $data['recipeId'] = $request['id'];
        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['cuisine'] = $request['cuisine'];
        $data['userId'] = $request['userId'];

        Foodie::create($data);
        return response()->json([
            'message' => 'Successfully created',
            'success' => true
        ], 200);
    }

    public function delete($id)
    {
        $res = Foodie::find($id)->delete();
        return response()->json([
            'message' => 'Successfully deleted',
            'success' => true
        ], 200);
    }

    public function get($id)
    {
        $data = Foodie::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['cuisine'] = $request['cuisine'];

        Foodie::find($id)->update($data);

        return response()->json([
            'message' => 'Successfully updated',
            'success' => true
        ], 200);
    }

    public function search(Request $request, $query, $category)
    {
        if ($query == '' || $query == null) {
            $data = Foodie::all();
            return response()->json($data, 200);
        } else {
            if ($category == '' || $category == null) {
                $data = Foodie::where('name', 'LIKE', '%' . $query . '%')->get();
                return response()->json($data, 200);
            } else {
                $data = Foodie::where([['name', 'LIKE', '%' . $query . '%'], ['cuisine', '=', $category]])->get();
                return response()->json($data, 200);
            }
        }
    }

    public function GetWatchList($id)
    {
        $data = Foodie::where('userId', '=', $id)->get();
        return response()->json($data->toArray(), 200);
    }
}
