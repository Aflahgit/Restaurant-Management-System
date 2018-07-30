@extends('layouts.app')

@section('tittle', 'Reservation')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstratp.min.css') }}">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Reservation</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width: 100%" cellspacing="0">
                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Created At</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date and Time</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $key=>$reservation)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $reservation->created_at }}</td>
                                                <td>{{ $reservation->name }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->date_and_time }}</td>
                                                <td>{{ $reservation->message }}</td>
                                                <td>
                                                    @if($reservation->status == true)
                                                        <span style="display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em;background-color:#5bc0de;">
                                                            Confirmed</span>
                                                    @else
                                                        <span style="display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em;background-color:#d9534f;">
                                                            Not Confirmed Yet</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($reservation->status == false)
                                                        <form action="{{ route('reservation.status', $reservation->id) }}"
                                                              id="status-form-{{ $reservation->id }}" style="display: none" method="post">
                                                            @csrf
                                                        </form>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                onclick="if(confirm('Are you sure to confirm this?')){
                                                                    event.preventDefault();
                                                                    document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                                    }else {
                                                                    event.preventDefault();
                                                                    }">
                                                            <i class="material-icons">done</i>
                                                        </button>
                                                    @endif
                                                    <form action="{{ route('reservation.destroy', $reservation->id) }}"
                                                          id="delete-form-{{ $reservation->id }}" style="display: none" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if(confirm('Are you sure to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
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
