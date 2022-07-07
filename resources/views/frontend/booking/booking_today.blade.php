@extends('frontend.template')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container py-5">

        <h3>{{ $futsal->name }}</h3>

        <ul class="nav nav-tabs d-flex justify-content-center my-4" id="myTab" role="tablist">
            <a class="tab_link" href="/futsals/{{ $futsal->id }}/book-today">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom__tab" id="today-tab" data-bs-toggle="tab" data-bs-target="#today"
                        type="button" role="tab" aria-controls="today" aria-selected="true">Today</button>
                </li>
            </a>
            <a class="tab_link" href="/futsals/{{ $futsal->id }}/book-tomorrow">
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom__tab" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow"
                        type="button" role="tab" aria-controls="tomorrow" aria-selected="false">Tomorrow</button>
                </li>
            </a>
            <a class="tab_link" href="/futsals/{{ $futsal->id }}/book-after">
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom__tab" id="after-tab" data-bs-toggle="tab" data-bs-target="#after" type="button"
                        role="tab" aria-controls="after" aria-selected="false">Day After</button>
                </li>
            </a>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="today-tab">
                <div class="row gy-4 my-4">
                    @foreach ($time as $time)
                        <div class="col-3">
                            <form method='post' action="/book-futsal">
                                @csrf
                                <input name='date' value={{ $date }} type="hidden" />
                                <input name='futsal_id' value={{ $futsal->id }} type="hidden" />
                                <input name='booker_id' value={{ Auth::user()->id }} type="hidden" />
                                <input name='time' value={{ $time->time }} type="hidden" />
                                <input name='isBooked' value={{ 1 }} type="hidden" />
                                <button class="btn" style="width: 100%">
                                    <div class="card" style="color:white;background:#2bae66ff">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $time->time }}</h5>
                                            <p>{{ $futsal->isBooked ? 'Booked' : 'Available' }}</p>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endforeach
                    <br />
                    {{ $booked_time ? '<h3>Booked Sessions</h3>' : '' }}
                    @foreach ($booked_time as $time)
                        <div class="col-3">
                            <form method='post' action="/book-futsal">
                                {{-- @csrf
                            <input name='date' value={{$today}} type="hidden" />
                            <input name='futsal_id' value={{$futsal->id}} type="hidden" />
                            <input name='booker_id' value={{Auth::user()->id}} type="hidden" />
                            <input name='time' value={{$time->time}} type="hidden" />
                            <input name='isBooked' value={{1}} type="hidden" /> --}}
                                {{-- <input name='startTime' value="{{$i}}:00" type="hidden" />
                            <input name='endTime' value="{{$i+1}}:00" type="hidden" /> --}}
                                <button class="btn" style="width: 100%">
                                    <div class="card" style="color:white;background:red">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $time->time }}</h5>
                                            <p>Booked</p>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        @endsection
