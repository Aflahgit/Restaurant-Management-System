@extends('layouts.app')

@section('tittle', 'Create Category')

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
                            <h4 class="card-title ">Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Name Category</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <a href="{{ route('category.index') }}" class="btn btn-danger">BACK</a>
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
