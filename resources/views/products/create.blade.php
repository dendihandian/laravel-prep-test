@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>
                        {{ __('Create Product') }}
                    </span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="titleInput">{{ __('Product Title') }}</label>
                            <input class="form-control" name="title" type="text" value="{{ old('title') }}" id="titleInput" aria-describedby="titleHelp">
                            @if ($errors->has('title'))
                                <div class="validation-messages">
                                    <ul>
                                        @foreach ($errors->get('title') as $message)
                                            <li class="text-danger">{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="descInput">{{ __('Product Description') }}</label>
                            <textarea class="form-control" id="descInput" name="description" value="{{ old('description') }}" cols="30" rows="5" style="resize: none;" aria-describedby="descHelp"></textarea>
                            @if ($errors->has('description'))
                                <div class="validation-messages">
                                    <ul>
                                        @foreach ($errors->get('description') as $message)
                                            <li class="text-danger">{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="priceInput">{{ __('Product Price') }}</label>
                                    <input class="form-control" name="price" type="number" value="{{ old('price') ?? 0 }}" min="0" max="1000" id="priceInput" aria-describedby="priceHelp">
                                    @if ($errors->has('price'))
                                        <div class="validation-messages">
                                            <ul>
                                                @foreach ($errors->get('price') as $message)
                                                    <li class="text-danger">{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="stockInput">{{ __('Product Stock') }}</label>
                                    <input class="form-control" name="stock" type="number" value="{{ old('stock') ?? 0 }}" min="0" max="99" id="stockInput" aria-describedby="stockHelp">
                                    @if ($errors->has('stock'))
                                        <div class="validation-messages">
                                            <ul>
                                                @foreach ($errors->get('stock') as $message)
                                                    <li class="text-danger">{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
