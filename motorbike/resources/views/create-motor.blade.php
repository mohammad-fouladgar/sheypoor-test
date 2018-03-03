@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create A New MotorBikes</div>
                <span style="padding:10px;color:red">Note: All field is required</span>
                <div class="card-body">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success in alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <strong>Success!</strong>  {{ session('status') }}
                        </div>
                    @endif

                    {{$errors->first()}}
                </div>

                    <form method="POST" action="{{ route('motors.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="model" class="col-sm-4 col-form-label text-md-right">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cc" class="col-sm-4 col-form-label text-md-right">CC</label>

                            <div class="col-md-6">
                                <input id="cc" type="text" class="form-control{{ $errors->has('cc') ? ' is-invalid' : '' }}" name="cc" value="{{ old('cc') }}" required>

                                @if ($errors->has('cc'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label text-md-right">Weight</label>

                            <div class="col-md-6">
                                <input id="weight" type="number"  min="100" max="500" step="10" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required>

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" min="100" step="0.22" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="color" class="col-sm-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <select name="color" id="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" required>
                                <option value=''>--- Please select a color ---</option>
                                <option value="white">White</option>
                                <option value="black">Black</option>
                                <option value="red">Red</option>
                                <option value="orang">Orang</option>
                                <option value="blue">Blue</option>
                                <option value="yellow">Yellow</option>
                                <option value="gray">Gray</option>
                                </select>
                                @if ($errors->has('color'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="photo" class="col-sm-4 col-form-label text-md-right">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file"  class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" required>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  
                        <div class="form-group row">
                            <div  class="col-md-4"></div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Create MotorBikes !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
