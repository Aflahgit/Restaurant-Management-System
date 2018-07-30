@extends('layouts.app')

@section('tittle', 'Slider')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-info">Add new Slider</a>
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All SLider</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%" cellspacing="0">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Tittle</th>
                                        <th>Sub Tittle</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($sliders as $key=>$slider)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $slider->tittle }}</td>
                                                <td>{{ $slider->sub_tittle }}</td>
                                                <td>{{ $slider->image }}</td>
                                                <td>{{ $slider->created_at }}</td>
                                                <td>{{ $slider->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('slider.edit', $slider->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <form action=" {{ route('slider.destroy', $slider->id) }}"
                                                          id="delete-form-{{ $slider->id }}" style="display: none" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if(confirm('Are you sure to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $slider->id }}').submit();
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
