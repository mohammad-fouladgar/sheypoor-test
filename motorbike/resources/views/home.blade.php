@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome To Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="row row justify-content-center">
                    <a href="{{route('motors.create')}}"  class="btn btn-primary btn-lg">Create A New MotorBikes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
