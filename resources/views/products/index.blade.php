@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Product List') }}
                    </span>
                    <div>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-left" scope="col">Title</th>
                                <th class="text-right" scope="col" width="5%">Price</th>
                                <th class="text-right" scope="col" width="5%">Stock</th>
                                <th class="text-center" scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="text-left">{{ $product->title }}</td>
                                    <td class="text-right">{{ $product->price }}</td>
                                    <td class="text-right">{{ $product->stock }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm mx-1" href="{{ route('products.show', ['product' => $product->id ]) }}">{{ __('Detail') }}</a>
                                        <a class="btn btn-info btn-sm mx-1 text-white" href="{{ route('products.update', ['product' => $product->id ]) }}">{{ __('Edit') }}</a>
                                        <a class="btn btn-danger btn-sm mx-1" href="{{ route('products.delete', ['product' => $product->id ]) }}">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{ __('No product available') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
