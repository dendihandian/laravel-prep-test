@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Product Detail') }}
                    </span>
                </div>

                <div class="card-body">

                    @include('products.form')

                    <a class="btn btn-info text-white" href="{{ route('products.index') }}">{{ __('Back to list') }}</a>
                    <a class="btn btn-success" href="{{ route('products.edit', ['product' => $product->id ?? '']) }}">{{ __('Edit') }}</a>
                    <a class="btn btn-danger" href="{{ route('products.delete', ['product' => $product->id ?? '']) }}">{{ __('Delete') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
