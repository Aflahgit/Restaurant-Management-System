@extends('layouts.app')

@section('tittle', 'Create Item')

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
                            <h4 class="card-title ">Create Item</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('item.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Name Item</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Description Item</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Price Item</label>
                                            <input type="number" class="form-control" name="price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label pull-left">Image</label>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <input type="file" name="image">
                                </div>

                                <div class="form-group row mb-0">
                                    <a href="{{ route('item.index') }}" class="btn btn-danger">BACK</a>
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
