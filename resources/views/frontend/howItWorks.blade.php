@extends('frontend.template')

@section('title')
    How It Works | Go Futsal
@endsection

@section('content')
<div class="container text-center py-5">
    <h3>How It Works</h3>
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
@endsection
