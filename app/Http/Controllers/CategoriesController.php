<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	public function index()
	{
		return view('admin.categories.index')->with('categories', Category::all());
	}

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);

    	$category = new Category;

    	$category->name = $request->name;
    	$category->save();

    	Session::flash('success', 'You succesfully created a category.');

    	return redirect()->back();
    }

    public function edit($id){
    	$category = Category::find($id);

    	return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id){
    	$category = Category::find($id);

    	$category->name = $request->name;

    	$category->save();

    	Session::flash('success', 'You succesfully updated the category.');

    	return redirect()->route('categories');
    }

    public function destroy($id){
    	$category = Category::find($id);

    	$category->delete();

    	Session::flash('success', 'You succesfully deleted the category.');
    	
    	return redirect()->route('categories');
    }
}
