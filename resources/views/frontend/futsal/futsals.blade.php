@extends('frontend.template')

@section('title')
    Futsal | Go Futsal
@endsection

@section('content')

<div class="container">

    {{-- <h3 class="py-2">Select from multiple Futsals</h3> --}}
    <div class="row py-5 justify-content-evenly">
        @foreach ( $futsal as $futsal)
        <div class="profile-card-2 col-3"><img src="{{asset('/images/futsals/'.$futsal->image)}}" class="img">
            <div class="profile-name">{{ $futsal->name }}</div>
            <div class="profile-username">{{$futsal->area}}, {{$futsal->city}}</div>
            <div class="profile-button-1">
                <a href="/futsals/{{$futsal->id}}" class="btn book__button">Details</a>
                <a href="/futsals/{{$futsal->id}}/book-today" class="btn book__button">Book Now</a>
            </div>
        </div>
    @endforeach
    </div>

</div>

@endsection
