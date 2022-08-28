@extends('frontend.template')

@section('content')

<div class="container">

    <h6 class="py-2">You searched for  "{{$keyword}}"</h6>
    @if($message!=="")
    <div class="py-5" style="display:flex;justify-content: center;align-items: center;min-height:50vh;">
        <div class="text-center">
            <img width="100px" src="{{asset('/images/search-icon.jpg')}}" />
        <p class="py-2">{{$message}}</p>
        </div>
    </div>
    @endif
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
