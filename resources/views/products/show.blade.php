@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Product Detail') }}
                    </span>
                </div>

                <div class="card-body">

                    @include('products.partials.form', ['readonly' => true])

                    <div class="mt-4">
                        <a class="text-white btn btn-info" href="{{ route('products.index') }}">{{ __('Back to list') }}</a>
                        <a class="btn btn-success" href="{{ route('products.edit', ['product' => $product->id ?? '']) }}">{{ __('Edit') }}</a>
                        <a class="btn btn-danger" onclick="deleteConfirm('delete-product-{{ $product->id }}', 'Do you want to delete {{ $product->title }} ?')">{{ __('Delete') }}</a>
                        <form method="POST" id="delete-product-{{ $product->id }}" action="{{ route('products.delete', ['product' => $product->id]) }}">
                            @csrf
                            <input type="hidden" name="redirect_to_index">
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
