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
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Product Images and Multiple Upload</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">User Profile Management</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">User Image and Single Upload</span>
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
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">JSON Resource for Product List and Detail</span>
                            </div>
                        </div>
                        <div class="todos-section col-4 mb-4">
                            <h5>Composer Package Implementation:</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Laravel Passport</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Yajra Datatables Oracle</span>
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
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Laravel Vouchers</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Laravel Options</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Larecipe</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">Laravel Tenancy</span>
                            </div>
                        </div>
                        <div class="todos-section col-4 mb-4">
                            <h5>NodeJS Package Implementation:</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Datatables</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Font Awesome</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" checked><span class="ml-2">Sweet Alert2</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">ChartJS</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox"><span class="ml-2">jQuery UI DatePicker</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
