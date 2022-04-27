@extends('frontend.template')

@section('content')

<div class="container">

    <h3 class="py-2">Select from multiple Futsals</h3>
    @foreach ( $futsal as $item)
    <div class="card shadow mb-5 bg-body rounded" style="width: 18rem;">
        <img src="{{asset('/images/futsals/'.$futsal->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $futsal->futsal_name }}</h5>
            <p class="card-text">
                {{$futsal->area}}, {{$futsal->city}}
            </p>
            <div style="display: flex; justify-content: space-around;">
                <a href="/futsals/{{$futsal->id}}" class="btn btn-primary">Details</a>
                <a href="/futsals/{{$futsal->id}}/book" class="btn btn-success">Book Now</a>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection
