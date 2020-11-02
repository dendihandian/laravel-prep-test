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
                                        <a class="btn btn-info btn-sm mx-1 text-white" href="{{ route('products.edit', ['product' => $product->id ]) }}">{{ __('Edit') }}</a>
                                        <a class="btn btn-danger btn-sm mx-1">{{ __('Delete') }}</a>
                                        {{-- <a tabindex="0" class="btn btn-sm btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a> --}}
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

                <div class="card-footer d-flex align-items-center justify-content-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
