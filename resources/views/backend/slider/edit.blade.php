@extends('layouts.app')

@section('tittle', 'Slider')

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
                            <h4 class="card-title ">Create Slider</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Tittle</label>
                                            <input type="text" class="form-control" name="tittle" value="{{ $slider->tittle }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="bmd-label-floating">Sub Tittle</label>
                                            <input type="text" class="form-control" name="sub_tittle" value="{{ $slider->sub_tittle }}">
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
                                    <a href="{{ route('slider.index') }}" class="btn btn-danger">BACK</a>
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
