@extends('frontend.template')

@section('title')
{{$futsal->name}}
@endsection

@section('content')

<div class="container">
    <div class="row py-5">
        <div class="col">
            <img width="100%" style="border-radius:5px;"
                src="{{asset('/images/futsals/'.$futsal->image)}}" alt="lol" />
        </div>
        <div class="col">
                <h1>{{$futsal->name}}</h1>
                <p>{{$futsal->area}}, {{ $futsal->city}}</p>
                <a href="callto:{{$futsal->contact}}">{{$futsal->contact}}</a><br />
                <a href="mailto:{{$futsal->email}}">{{$futsal->email}}</a>
            <hr />
            <p>
                We try to provide quality services to our customers try it out by booking our futsal and getting the
                experience.
            </p>
            <a href="/futsals/{{$futsal->id}}/book-today" class="btn btn-success">Book Now</a>

        </div>
    </div>
    <div class="container-fluid">
        <div class="map-responsive">
       <iframe src={{"https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=$futsal->map"}} width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
</div>

@endsection
