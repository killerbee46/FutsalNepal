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
    <div class="row">
        @foreach ( $futsal as $futsal)
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
