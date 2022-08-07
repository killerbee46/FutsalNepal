@extends('frontend.template')

@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img height="400px" src="https://i.ytimg.com/vi/-mwaLB0SR34/maxresdefault.jpg" class="d-block w-100"
                alt="...">
        </div>
        <div class="carousel-item">
            <img height="400px" src="https://i.ytimg.com/vi/-mwaLB0SR34/maxresdefault.jpg" class="d-block w-100"
                alt="...">
        </div>
        <div class="carousel-item">
            <img height="400px" src="https://i.ytimg.com/vi/-mwaLB0SR34/maxresdefault.jpg" class="d-block w-100"
                alt="...">
        </div>
    </div>
</div>

{{-- <div style="transform: translateY(-40px);">
    <x-filter />
</div> --}}




<div class="container text-center py-5">
    <h5>Welcome to</h5>
    <h2>Go Futsal</h2>
    <p>
        Here you can book the futsal of your choice if they have chosen to use our service. If you know a futsal that
        don't know about us let them know.
        If you own a futsal or want to book futsal, register now. Here is how it works:
    </p>
    <img width="100%" src="https://partner.booking.com/sites/default/files/user_images/d-HrBgMwwnMIVBNCpR3IPQ.png" alt="nanda" >
</div>

<div class="container py-5">
    <h3 class="py-2">Featured Futsals</h3>
    <div class="row gy-5">
        @foreach($futsal as $futsal)
        <div class="card hover custom__card shadow mb-5 bg-body rounded">
               <img height="100%" width="100%" src="{{asset('/images/futsals/'.$futsal->image)}}" class="card-img-top card__cover" alt="...">
            <div class="card-body custom__card-body" onclick="redirect('/futsals/{{$futsal->id}}')">
                <div class="card__content">
                    <h5 class="card-title">{{ $futsal->name }}</h5>
                <p class="card-text">
                    {{$futsal->area}}, {{$futsal->city}}
                </p>
                <div class="pop_up">
                    <a href="/futsals/{{$futsal->id}}" class="btn book__button">Details</a>
                    <a href="/futsals/{{$futsal->id}}/book-today" class="btn book__button">Book Now</a>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
