<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['data' => $products], 200);
    }

    public function store(ProductStore $request)
    {
        $params = $request->only(['title', 'description', 'price', 'stock']);
        // $params['user_id'] = Auth::user()->id ?? null;

        $product = Product::create($params);

        return response()->json([
            'message' => 'Product created',
            'data' => $product,
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product,
        ], 200);
    }

    public function update(ProductUpdate $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        $product->save();

        return response()->json([
            'message' => 'Product updated',
            'data' => $product,
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
