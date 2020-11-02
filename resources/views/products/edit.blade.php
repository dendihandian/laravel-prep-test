@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Edit Product') }}    
                    </span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', ['product' => $product->id ]) }}">
                        @csrf
                        @method('PATCH')

                        @include('products.form')

                        <a class="btn btn-info text-white" href="{{ route('products.index') }}">{{ __('Back to list') }}</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
