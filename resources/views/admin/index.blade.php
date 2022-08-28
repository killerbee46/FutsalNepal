@extends('admin.adminmaster')
@section('title') Admin Dashboard

@endsection
@section('content')

<div>

<div class="d-flex justify-content-start">
    <div class="card dash_card">
        <p class="dash_card_title">Total Bookings</p>
        <p class="dash_card_number">{{$booking}}</p>
    </div>
    <div class="card dash_card">
        <p class="dash_card_title">Total Users</p>
        <p class="dash_card_number">{{$user}}</p>
    </div>
    <div class="card dash_card">
        <p class="dash_card_title">Total Futsals</p>
        <p class="dash_card_number">{{$futsal}}</p>
    </div>
</div>

<hr style="background: white">
<h5>Latest Bookings</h5>
<hr style="width: 200px">
<table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Status</th>
          <th scope="col">Penalty</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($latest as $booking )

          <tr>
              <th scope="row">{{$booking->id}}</th>
              <td>{{$booking->book_date}}</td>
              <td>{{$booking->book_time}}</td>
              <td>{{$booking->isBooked === 1 ? "Booked" : "Cancelled"}}</td>
              <td>{{$booking->penalty === 0 ? "N/A" : `Rs. $booking->penalty`}}</td>
            </tr>

  @endforeach
      </tbody>
  </table>
</div>

@endsection
