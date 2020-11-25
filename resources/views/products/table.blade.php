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
                    <table id="products-table" class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-left px-2" scope="col">No.</th>
                                <th class="text-left px-2" scope="col">Title</th>
                                <th class="text-right px-2" scope="col" width="8%">Price</th>
                                <th class="text-right px-2" scope="col" width="8%">Stock</th>
                                <th class="text-center" scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        var table = $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'price', name: 'email'},
                {data: 'stock', name: 'stock'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ]
        });
    });
</script>
@endsection
