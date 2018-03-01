@extends('layouts.app')

@section('content')
<div class="container">


	@include('filters', ['some' => 'data']);
	<div class="row justify-content-center" style="padding:20px">
		{{ $motors->appends(request()->except('page'))->links() }}
		</div>
    <div class="row">

		@forelse ($motors as $motor)
    	<!-- Card -->
			<div class="col-sm-6 col-md-4 col-lg-4 mt-4">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="{{asset('storage/motors/'.$motor->photo)}}" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">{{$motor->model}}</h5>
						<p class="card-text">Color : {{$motor->color}}</p>
						<p class="card-text">Price : {{$motor->price}} $</p>
						<a href="{{route('motors.show',$motor->id)}}" class="btn btn-primary">See Details</a>
					</div>
				</div>
			</div>
		@empty
   		<div class="alert alert-secondary" role="alert">
  		Not Found Motors
			</div>
		@endforelse
			
	
	
    </div>
		<div class="row justify-content-center" style="padding:20px">
			{{ $motors->appends(request()->except('page'))->links() }}
		</div>
</div>


@endsection
