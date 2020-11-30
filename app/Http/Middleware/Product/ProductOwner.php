<?php

namespace App\Http\Middleware\Product;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // get id from url parameter
        $id = $request->segment(3);

        // find product
        $product = \App\Models\Product::where([
            'id' => $id,
            'user_id' => Auth::user()->id,
        ])->first();

        // check if the product not found
        if (!$product) {
            $request->session()->flash('error', 'Product Not Found');
            return redirect()->back();
        }

        // add product to request attributes (pass product to the controller)
        $request->attributes->add(['product' => $product]);

        return $next($request);
    }
}
