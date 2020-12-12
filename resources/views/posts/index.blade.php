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
                    <table id="posts-table" class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-left px-2" scope="col">Title</th>
                                <th class="text-center" scope="col">Published</th>
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
        var table = $('#posts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('posts.datatable') }}",
            columns: [
                {data: 'title', name: 'title'},
                {data: 'published', name: 'published'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ],
            columnDefs: [
                { className: "text-center", "targets": [-1, -2] }
            ]
        });
    });
</script>
@endsection
