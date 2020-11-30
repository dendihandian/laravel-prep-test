@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a href="{{ route('products.index') }}">To Products List</a> --}}

                    <div class="todos row">
                        <div class="todos-section col-4 mb-4">
                            <h5>Fundamental Implementation:</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Product CRUD</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Product Factory</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Product Owner Middleware</span>
                            </div>
                        </div>
                        <div class="todos-section col-4 mb-4">
                            <h5>Fundamental API Implementation:</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Product API CRUD</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Login and Register API Endpoint</span>
                            </div>
                        </div>
                        <div class="todos-section col-4 mb-4">
                            <h5>Package Implementation:</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Laravel Passport</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Yajra Datatables</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Laravel-Localization</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Laravel-Audit</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Laravel Excel</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Log Viewer</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Laratrust</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
