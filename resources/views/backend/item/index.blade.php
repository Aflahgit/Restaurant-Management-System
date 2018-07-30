@extends('layouts.app')

@section('tittle', 'Items')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('item.create') }}" class="btn btn-info">Add new Item</a>
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%" cellspacing="0">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->name }}</td>>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td><img class="img-responsive img-thumbnail"
                                                         src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('item.edit', $item->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <form action=" {{ route('item.destroy', $item->id) }}"
                                                          id="delete-form-{{ $item->id }}" style="display: none" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if(confirm('Are you sure to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $item->id }}').submit();
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
