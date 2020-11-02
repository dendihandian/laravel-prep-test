<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(ProductStore $request)
    {
        Product::create($request->only(['title', 'description', 'price', 'stock']));

        $request->session()->flash('success', __('Product created'));
        return redirect()->route('products.index');
    }
    
    public function show($productId)
    {
        $product = Product::find($productId);

        return view('products.show', compact('product'));
    }

    public function edit($productId)
    {
        $product = Product::find($productId);

        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdate $request, $productId)
    {
        $params = $request->only(['title', 'description', 'price', 'stock']);

        $product = Product::find($productId);
        $product->title = $params['title'];
        $product->description = $params['description'];
        $product->price = $params['price'];
        $product->stock = $params['stock'];
        $product->save();

        $request->session()->flash('success', __('Product updated'));
        return redirect()->back();
    }

    public function delete($productId)
    {
        return 'delete ' . $productId;
    }
}
