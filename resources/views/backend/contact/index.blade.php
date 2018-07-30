@extends('layouts.app')

@section('tittle', 'Contact')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%" cellspacing="0">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Sent At</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <a href="{{ route('contact.show', $contact->id) }}"
                                                   class="btn btn-info btn-sm">
                                                    <i class="material-icons">details</i>
                                                </a>
                                                <form action="{{ route('contact.destroy', $contact->id) }}"
                                                      id="delete-form-{{ $contact->id }}" style="display: none" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="if(confirm('Are you sure to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $contact->id }}').submit();
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
