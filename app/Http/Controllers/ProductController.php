<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories'])->get();
        $categories = Category::all();

        return view('products.index', compact(['products','categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $product = Product::create((array) $request->only(['title','description','details','price', 'user_id']));
        foreach ($request->only('category') as $value) {
            # code...
            $product->categories()->attach($value);
        }

        return redirect()->route('product.index')->with('message', [
            'type' => 'success',
            'content' => 'Produto cadastrado com sucesso.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message', [
            'type' => 'danger',
            'content' => 'Produto deletado.'
        ]);
    }

    public function filter(Request $request, int $id = 0)
    {
        // dd($products);
        $categories = Category::all();

        if($id){
            $products = Category::find($id)->products()->get();
            $category_selected = $categories->find($id);
        }else{
            $products = Product::with('categories')->where('title', 'LIKE', "%". $request->filter_name ."%")->get();
            $category_selected = null;
        }
        return view('products.index', compact('products','categories','category_selected'));

    }
}
