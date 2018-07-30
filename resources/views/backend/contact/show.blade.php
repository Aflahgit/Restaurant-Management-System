@extends('layouts.app')

@section('tittle', 'Contact')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.backend.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $contact->subject }}</h4>
                        </div>
                        <div class="card-body">
                            <strong>Name : {{ $contact->name }}</strong><br>
                            <b>Email : {{ $contact->email }}</b><br>
                            <strong>Message : </strong><hr>
                            <p>{{ $contact->message }}</p><hr>

                            <a href="{{ route('contact.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
