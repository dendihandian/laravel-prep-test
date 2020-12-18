<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        // dd($request->all());
        $params = $request->only(['title', 'description', 'price', 'stock']);
        $params['user_id'] = Auth::user()->id ?? null;

        $product = Product::create($params);

        if ($request->hasFile('image')) {
            $path = Storage::putFile("products/{$product->id}/images/", $request->file('image'));
            $explodedPath = explode('/', $path);
            $product->images()->create([
                'filename' => end($explodedPath),
                'path_to_file' => $path,
            ]);
        }

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

        $product->update(array_merge($params, [
            'user_id' => Auth::user()->id ?? null,
        ]));

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
                return view('products.partials.table-action', ['product' => $product]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function factory(Request $request, $count)
    {
        Log::debug('ProductController@factory', [
            'count' => $count
        ]);

        Product::factory([
            'user_id' => Auth::user()->id ?? null
        ])->count($count)->create();

        $request->session()->flash('success', __('Product generated'));
        return redirect()->route('products.index');
    }

    public function image(Request $request, $productId)
    {
        $product = Product::with('images')->find($productId);
        $path = optional($product->images->first())->path_to_file;

        if (!empty($path) && Storage::exists($path)) {
            return response()->file(storage_path('app/' . $path));
        } else {
            $request->session()->flash('error', __('Image not found'));
            return redirect()->back();
        }
    }
}
