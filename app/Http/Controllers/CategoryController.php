<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category list
    public function list()
    {
        $categories = Category::when(request('searchKey'), function ($query) {
            $query->where('name', 'like', '%' . request('searchKey') . '%');
        })->orderBy('id', 'desc')->paginate(5);
        $categories->appends(request()->all());
        return view('admin.category.list', compact('categories'));
    }

    //category add
    public function add()
    {
        return view('admin.category.add');
    }

    //category create
    public function create(Request $request)
    {
        $this->checkValidation($request);
        $data = $this->getData($request);
        Category::create($data);
        return redirect()->route('category#list');
    }

    //category delete
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('category#list')->with(['deleteSuccess' => 'Category Deleted']);
    }

    //category edit
    public function edit($id)
    {
        $category  = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    //category update
    public function update(Request $request)
    {
        $id = $request->categoryId;
        $this->checkValidation($request);
        $updateData = $this->getData($request);
        Category::where('id', $id)->update($updateData);
        return redirect()->route('category#list');
    }

    //check validate
    private function checkValidation($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:5|unique:categories,name,' . $request->categoryId,
        ])->validate();
    }

    //get data
    private function getData($request)
    {
        return [
            'name' => $request->categoryName
        ];
    }
}