@extends('frontend.template')

@section('title')
    Home | Go Futsal
@endsection

@section('content')

@if (session('error'))
            <div class="alert alert-danger" style="position: absolute; top:70px;left:0;right:0;text-align: center;z-index:5">
                {{ session('error') }}
            </div>
        @endif



<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="position: relative">
    <div class="carousel-inner">
        <div class="carousel-item cover-slider active">
            <img class="banner-img" src="{{ asset('/images/banners/banner1.webp') }}" class="d-block w-100"
                alt="...">
                <div class="text">
                    <p class="slider-title">Welcome to Go Futsal</p>
                <p class="slider-sub-title">An online futsal booking platform</p>
                @if (!Auth::user())
                    <a href="/register" class="btn btn-success">Get Started</a>
                    @else
                    <a href="/futsals" class="btn btn-success">Book Now</a>
                @endif
                </div>
        </div>
        <div class="carousel-item cover-slider">
            <img class="banner-img" src="{{ asset('/images/banners/banner2.webp') }}" class="d-block w-100"
                alt="...">
                <div class="text">
                <p class="slider-title">Explore Futsal</p>
                <p class="slider-sub-title">Explore futsals around you easily</p>
                @if (!Auth::user())
                    <a href="/register" class="btn btn-success">Get Started</a>
                    @else
                    <a href="/futsals" class="btn btn-success">Book Now</a>
                @endif
                </div>
        </div>
    </div>
</div>
<div class="stats">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <p class="title">Users</p><p class="number">{{$userCount}}</p>
            </div>
            <div class="col-4">
                <p class="title">Futsals</p><p class="number">{{$futsalCount}}</p>
            </div>
            <div class="col-4">
                <p class="title">Bookings</p><p class="number">{{$bookingCount}}</p>
            </div>
        </div>
    </div>
</div>

{{-- Unique Id Generator --}}
{{-- @php
    $data = uniqId();
    echo $data;
@endphp --}}

@if (count($recommender)!==0)
<div class="container py-5">
    <h3 class="py-2">Recommended Futsals</h3>
    <div class="row  py-5 justify-content-evenly">
@foreach ($recommender as $data )
<div class="profile-card-2 col-3"><img src="{{asset('/images/futsals/'.$data->image)}}" class="img">
    <div class="profile-name">{{ $data->name }}</div>
    <div class="profile-username">{{$data->area}}, {{$data->city}}</div>
    <div class="profile-button-1">
        <a href="/futsals/{{$data->id}}" class="btn book__button">Details</a>
        <a href="/futsals/{{$data->id}}/book-today" class="btn book__button">Book Now</a>
    </div>
</div>
@endforeach
    </div>

@endif


{{-- ESEWA-FORM  --}}
{{-- <form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value="1200" name="tAmt" type="hidden">
    <input value="1150" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="50" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
    <input value="Submit" type="submit">
    </form> --}}

{{-- <div style="transform: translateY(-40px);">
    <x-filter />
</div> --}}




@if (!Auth::user())


<div class="container text-center py-5">
    <h3>How it works</h3>
    <div class="row justify-content-center my-5">
        <div class="col-3 hiw-section">
            <p class="number">1</p>
            <p class="text">Register</p>
            <p class="icon">
                <a href="/register">
                    <img width="60%" src={{asset('/images/register.webp')}} /></a>
            </p>
        </div>
        <div class="col-3 hiw-section">
            <p class="number">2</p>
            <p class="text">Login</p>
            <p class="icon">
               <a href="/login">
                <img width="60%" src={{asset('/images/login.webp')}} /></a>
            </p>
        </div>
        <div class="col-3 hiw-section">
            <p class="number">3</p>
            <p class="text">Book</p>
            <p class="icon">
                <a href="/futsals">
                    <img width="60%" src={{asset('/images/book.webp')}} />
                </a>
            </p>
        </div>
    </div>

</div>
@endif

<div class="container py-5">
    <h3 class="py-2">Featured Futsals</h3>
    <div class="row  py-5 justify-content-evenly">
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
