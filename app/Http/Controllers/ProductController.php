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
        $products = Product::paginate();
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
        return view('products.show', compact('productId'));
    }

    public function edit()
    {
        return view('products.edit');
    }

    public function update(ProductUpdate $request, $productId)
    {
        return 'update ' . $productId;
    }

    public function delete($productId)
    {
        return 'delete ' . $productId;
    }
}
