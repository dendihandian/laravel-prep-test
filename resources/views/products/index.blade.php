@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Product List') }}
                    </span>
                    <div>
                        <a href="{{ route('products.create') }}" class="btn btn-primary mx-1">Create Product</a>
                        <a href="{{ route('products.table') }}" class="btn btn-success mx-1">Datatable Version</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-left px-2" scope="col">Title</th>
                                <th class="text-right px-2" scope="col" width="8%">Price</th>
                                <th class="text-right px-2" scope="col" width="8%">Stock</th>
                                <th class="text-center" scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="text-left px-2 align-middle">{{ $product->title }}</td>
                                    <td class="text-right align-middle px-2">{{ $product->price }}</td>
                                    <td class="text-right align-middle px-2">{{ $product->stock }}</td>
                                    <td class="d-flex justify-content-center">
                                        @include('products.partials.action', ['product' => $product])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">{{ __('No product available') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-end">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
