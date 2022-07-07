@extends('frontend.template')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container py-5">
<h3>My Booking History</h3>



@foreach ($booking_list as $booking )

<div>{{$booking->date}} </div>

@endforeach
</div>

@endsection
