@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                        @include('products.partials.form')

                        <div class="mt-4">
                            <a class="text-white btn btn-info" href="{{ route('products.index') }}">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
