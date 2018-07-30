@extends('layouts.app')

@section('tittle', 'Edit Item')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close"
                                        onclick="this.parentElement.style.display='none'">x</button>
                                <span>
                                    <b> Danger- </b> {{ $error }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Item</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category">
                                                @foreach($categories as $category)
                                                    <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Nama Item</label>
                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Description Item</label>
                                            <textarea class="form-control" name="description">{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Price Item</label>
                                            <input type="number" class="form-control" name="price" value="{{ $item->price }}">
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
