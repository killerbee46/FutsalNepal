@extends('futsal-admin.futsal-admin-master')
@section('title')
All Bookings
@endsection
@section('content')
<div>
    <h3>Booking List</h3>
<table class="table table-striped css-serial">
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
        @foreach ($booking_list as $booking )

        <tr>
            <td></td>
            <td>{{$booking->book_date}}</td>
            <td>{{$booking->book_time}}</td>
            <td>{{$booking->isBooked === 1 ? "Booked" : "Cancelled"}}</td>
            <td>{{$booking->penalty}}</td>
          </tr>

@endforeach
    </tbody>
  </table>


  {{ $booking_list->links("pagination::bootstrap-4")}}
</div>

@endsection
