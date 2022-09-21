@extends('futsal-admin.futsal-admin-master')
@section('title')
Cancelled Bookings
@endsection
@section('content')
<div>
    <h3>Cancelled Bookings</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Futsal</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">Penalty</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($booking_list as $booking )

            <tr>
                <th scope="row">{{$booking->id}}</th>
                <td>{{$booking->book_date}}</td>
                <td>{{$booking->futsal_id}}</td>
                <td>{{$booking->book_time}}</td>
                <td>{{$booking->isBooked === 1 ? "Booked" : "Cancelled"}}</td>
                <td>{{$booking->penalty}}</td>
              </tr>

    @endforeach
        </tbody>
      </table>



    </div>
</div>
@endsection
