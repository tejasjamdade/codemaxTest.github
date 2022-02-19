<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::where('status', '=', 'active')->where('status', '=', 'active')->get();
        
        return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $subcatagory = implode(',', $request->input('subCategory'));
        $postImage = '';
        $category = $request->input('parentCategory').', '.$subcatagory;
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = public_path('/images');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image'=> '/images/'.$postImage,
            'categories'=> $category,
            'status'=> $request->input('status')
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::where('status', '=', 'active')->where('status', '=', 'active')->get();
        
        return view('products.edit', compact('product', 'category'));
    }
   
    public function update(Request $request, Product $product)
    {
        $postImage = '';
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = public_path('/images');
            $postImage = '/images/'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }else{
            $postImage = $product->image;
        }
        $subcatagory = implode(',', $request->input('subCategory'));
        $product->update($input);
        $category = $request->input('parentCategory').', '.$subcatagory;
        $update = Product::where('id', $product->id)->update([
            'name'=> $request->input('name'),
            'description'=> $request->input('description'),
            'image'=> $postImage,
            'categories'=> $category,
            'status'=> $request->input('status')
        ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}