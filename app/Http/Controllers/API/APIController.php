<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // public function getUserList()
    // {
    //     $users = User::get();
    //     return response()->json($users, 200);
    // }

    //read data
    public function getCategoryList()
    {
        $categorires = Category::get();
        $data = [
            'category' => $categorires
        ];
        return response()->json($data, 200);
    }

    //read one data
    public function getOne($id)
    {
        $id = $id;
        $response = Category::where('id', $id)->first();
        return response()->json($response, 200);
    }

    //create data
    public function createCategory(Request $request)
    {

        $data = $this->getData($request);
        $response = Category::create($data);
        return response()->json($response, 200);
    }

    //delete data
    public function deleteCategory(Request $request)
    {
        $id = $request->id;
        $data = Category::where('id', $id)->first();
        if (isset($data)) {
            Category::where('id', $id)->delete();
            return response()->json(['message' => 'category deleted'], 200);
        }
        return response()->json(['message' => 'category not found'], 404);
    }

    //update data
    public function updateCategory(Request $request)
    {
        $id = $request->id;
        $data = Category::where('id', $id)->first();
        if (isset($data)) {
            $updateData = $this->updateData($request);
            Category::where('id', $id)->update($updateData);
            $response = Category::where('id', $id)->first();
            return response()->json($response, 200);
        }
        return response()->json(['message' => 'category not found'], 404);
    }


    //get data
    private function getData($request)
    {
        return [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    private function updateData($request)
    {
        return [
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ];
    }
}