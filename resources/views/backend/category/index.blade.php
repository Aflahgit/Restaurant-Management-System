@extends('layouts.app')

@section('tittle', 'Category')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('category.create') }}" class="btn btn-info">Add new Category</a>
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%" cellspacing="0">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key=>$category)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <form action=" {{ route('category.destroy', $category->id) }}"
                                                          id="delete-form-{{ $category->id }}" style="display: none" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if(confirm('Are you sure to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $category->id }}').submit();
                                                            }else {
                                                                event.preventDefault();
                                                                }">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('/DataTables/datatables.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endpush
