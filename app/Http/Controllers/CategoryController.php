<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();

        return view('categories.index', compact('category'));
    }

    public function create()
    {
        $category = Category::where('isparent', '=', 'yes')->where('status', '=', 'active')->get();
        
        return view('categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $parent = null;
        if($request->input('isparent') == 'no'){
            $parent = $request->input('parentCategory');
        }
        $category = Category::create([
            'name' => $request->input('name'),
            'parent' => $parent,
            'isparent' => $request->input('isparent'),
            'status'=> $request->input('status')
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::where('isparent', '=', 'yes')->where('status', '=', 'active')->get();
        $categories = Category::find($id);
        
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $parent = null;
        if($request->input('isparent') == 'no'){
            $parent = $request->input('parentCategory');
        }
        $update = Category::where('id', $category->id)->update([
            'name'=> $request->input('name'),
            'parent'=> $parent,
            'isparent'=> $request->input('isparent'),
            'status'=> $request->input('status')
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
