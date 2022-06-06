@extends('frontend.template')

@section('content')

<div class="container">

    <h3 class="py-2">Select from multiple Futsals</h3>
    <div class="row">
        @foreach ( $futsal as $futsal)
    <div class="col-md-4 g5">
        <div class="card shadow mb-5 bg-body rounded">
            <img src="{{asset('/images/futsals/'.$futsal->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $futsal->name }}</h5>
                <p class="card-text">
                    {{$futsal->area}}, {{$futsal->city}}
                </p>
                <div style="display: flex; justify-content: space-around;">
                    <a href="/futsals/{{$futsal->id}}" class="btn btn-primary">Details</a>
                    <a href="/futsals/{{$futsal->id}}/book" class="btn btn-success">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

</div>

@endsection
