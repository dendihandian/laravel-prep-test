<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        return 'store';
    }
    
    public function show($productId)
    {
        return view('products.show', compact('productId'));
    }

    public function edit()
    {
        return view('products.edit');
    }

    public function update(Request $request, $productId)
    {
        return 'update ' . $productId;
    }

    public function delete($productId)
    {
        return 'delete ' . $productId;
    }
}
