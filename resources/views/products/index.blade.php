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
                                        <a class="mx-1 text-success" href="{{ route('products.show', ['product' => $product->id ]) }}"><i class="fas fa-eye"></i></a>
                                        <a class="mx-1 text-info" href="{{ route('products.edit', ['product' => $product->id ]) }}"><i class="fas fa-edit"></i></a>
                                        <a class="mx-1 text-danger" href="#" onclick="deleteConfirm('delete-product-{{ $product->id }}', 'Do you want to delete {{ $product->title }} ?')"><i class="fas fa-trash"></i></a>
                                        <form method="POST" id="delete-product-{{ $product->id }}" action="{{ route('products.delete', ['product' => $product->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        {{-- <a tabindex="0" class="btn btn-sm btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a> --}}
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
