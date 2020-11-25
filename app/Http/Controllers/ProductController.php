<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStore $request)
    {
        $params = $request->only(['title', 'description', 'price', 'stock']);
        $params['user_id'] = Auth::user()->id ?? null;

        Product::create($params);

        $request->session()->flash('success', __('Product created'));
        return redirect()->route('products.index');
    }

    public function show(Request $request, $productId)
    {
        $product = $request->get('product') ?? Product::find($productId);

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

        $product = $request->get('product') ?? Product::find($productId);
        $product->title = $params['title'];
        $product->description = $params['description'];
        $product->price = $params['price'];
        $product->stock = $params['stock'];
        $product->user_id = Auth::user()->id ?? null;
        $product->save();

        $request->session()->flash('success', __('Product updated'));
        return redirect()->back();
    }

    public function delete(Request $request, $productId)
    {
        $product = $request->get('product') ?? Product::find($productId);
        if ($product) $product->delete();
        $request->session()->flash('success', __('Product deleted'));

        if ($request->has('redirect_to_index')) return redirect()->route('products.index');

        return redirect()->back();
    }

    public function table()
    {
        return view('products.table');
    }

    public function datatable()
    {
        $data = Product::where('user_id', Auth::user()->id)->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($product) {
                return view('products.partials.action', ['product' => $product]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function factory(Request $request, $count)
    {
        Product::factory([
            'user_id' => Auth::user()->id ?? null
        ])->count($count)->create();

        $request->session()->flash('success', __('Product generated'));
        return redirect()->route('products.index');
    }
}
