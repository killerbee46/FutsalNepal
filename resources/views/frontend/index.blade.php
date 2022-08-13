@extends('frontend.template')

@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item cover-slider active">
            <img class="banner-img" src="{{ asset('/images/banners/banner1.webp') }}" class="d-block w-100"
                alt="...">
                <p class="slider-title">Welcome to Go Futsal</p>
                <p class="slider-sub-title">An online futsal booking platform</p>
        </div>
        <div class="carousel-item cover-slider">
            <img class="banner-img" src="{{ asset('/images/banners/banner2.webp') }}" class="d-block w-100"
                alt="...">
                <p class="slider-title">Welcome to Go Futsal</p>
                <p class="slider-sub-title">An online futsal booking platform</p>
        </div>
    </div>
</div>

{{-- <div style="transform: translateY(-40px);">
    <x-filter />
</div> --}}




<div class="container text-center py-5">
    <h3>Here is how it works</h3>
    </p>
    <img width="100%" src="https://partner.booking.com/sites/default/files/user_images/d-HrBgMwwnMIVBNCpR3IPQ.png" alt="nanda" >
</div>

<div class="container py-5">
    <h3 class="py-2">Featured Futsals</h3>
    <div class="row gy-5">
        @foreach($futsal as $futsal)
        {{-- <div class="card hover custom__card shadow mb-5 bg-body rounded">
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
        </div> --}}

        <div class="profile-card-2 col-3"><img src="{{asset('/images/futsals/'.$futsal->image)}}" class="img img-fluid">
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
