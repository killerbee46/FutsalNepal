@extends('frontend.template')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container py-5">
        <h3>{{$futsal->name}}</h3>

    <ul class="nav nav-tabs d-flex justify-content-center my-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab" aria-controls="today" aria-selected="true">Today</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Tomorrow</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">{{$after}}</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="today-tab">
            <table class="table">
                <div class="row gy-4 my-4">
                    @foreach($time as $time) <div class="col-3">
                        <form method='post' action="/book-futsal">
                            @csrf
                            <input name='date' value={{$today}} type="hidden" />
                            <input name='futsal_id' value={{$futsal->id}} type="hidden" />
                            <input name='booker_id' value={{Auth::user()->id}} type="hidden" />
                            <input name='time' value={{$time}} type="hidden" />
                            <input name='isBooked' value={{1}} type="hidden" />
                            {{-- <input name='startTime' value="{{$i}}:00" type="hidden" />
                            <input name='endTime' value="{{$i+1}}:00" type="hidden" /> --}}
                            <button class="btn" style="width: 100%">
                                <div class="card {{$futsal->isBooked ? "bookedStyle" : "availStyle"}}" style="color:white;background:{{$futsal->isBooked ? red : "#2bae66ff" }}">
                                    <div class="card-body text-center">
                                      <h5 class="card-title">{{$time}}</h5>
                                      <p>{{$futsal->isBooked ? "Booked" : "Available"}}</p>
                                    </div>
                                  </div>
                            </button>
                        </form>
                </div>
                @endforeach
        </div>
        </table>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table">
                <div class="row gy-4 my-4">
                    @for($i = 5; $i < 19 ; $i ++) <div class="col-3">
                        <div class="card {{$futsal->isBooked ? "bookedStyle" : "availStyle"}}" style="color:white;background:{{$futsal->isBooked ? red : "#2bae66ff" }}">
                            <div class="card-body text-center">
                              <h5 class="card-title">{{$i <= 12 ? $i : $i - 12}} - {{$i+1 <= 12 ? $i+1 : $i+1 - 12}}</h5>
                              <p>{{$futsal->isBooked ? "Booked" : "Available"}}</p>
                            </div>
                          </div>
                </div>
                @endfor
        </div>
        </table>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <table class="table">
                <div class="row gy-4 my-4">
                    @for($i = 5; $i < 19 ; $i ++) <div class="col-3">
                        <div class="card {{$futsal->isBooked ? "bookedStyle" : "availStyle"}}"  style="color:white;background:{{$futsal->isBooked ? red : "#2bae66ff" }}">
                            <div class="card-body text-center">
                              <h5 class="card-title">{{$i <= 12 ? $i : $i - 12}} - {{$i+1 <= 12 ? $i+1 : $i+1 - 12}}</h5>
                              <p>{{$futsal->isBooked ? "Booked" : "Available"}}</p>
                            </div>
                          </div>
                </div>
                @endfor
        </div>
        </table>

        </div>
      </div>
</div>

@endsection
