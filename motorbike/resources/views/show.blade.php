@extends('layouts.app')

@section('content')
<style>
span .form-control{
	border:none !important;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ucfirst($motorBike->model)}}</b></div>
                <div class="card-body">

                        <div class="form-group row">
                            <label for="model" class="col-sm-4 col-form-label text-md-right">Model :</label>

                            <div class="col-md-6">
                                <span class="form-control" style="border:none"> {{$motorBike->model}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cc" class="col-sm-4 col-form-label text-md-right">CC :</label>
 							<div class="col-md-6">
                                <span class="form-control" style="border:none"> {{$motorBike->cc}}</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label text-md-right">Weight</label>

                           <div class="col-md-6">
                                <span class="form-control" style="border:none"> {{$motorBike->weight}}</span>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <span class="form-control" style="border:none"> {{$motorBike->price}} $</span>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="color" class="col-sm-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <span class="form-control" style="border:none"> {{$motorBike->color}}</span>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="photo" class="col-sm-4 col-form-label text-md-right">Photo</label>

                            <div class="col-md-6">
                               <img src="{{asset('storage/motors/'.$motorBike->photo)}}" width="300px" height="300px" />
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
