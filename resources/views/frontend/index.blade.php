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

<div style="transform: translateY(-40px);">
    <x-filter />
</div>




<div class="container text-center">
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
        @for($i = 0; $i < 3; $i++)
        <div class="col-4">
            <x-futsal-card />
        </div>
        @endfor
    </div>
</div>

@endsection
