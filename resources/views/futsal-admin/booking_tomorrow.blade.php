@extends('futsal-admin.futsal-admin-master')

@section('title')
Booking - Tomorrow
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">

        <ul class="nav nav-tabs d-flex justify-content-center my-4" id="myTab" role="tablist">
            <a class="tab_link" href="/futsal-admin/bookings">
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom__tab" id="today-tab" data-bs-toggle="tab" data-bs-target="#today"
                        type="button" role="tab" aria-controls="today" aria-selected="true">Today</button>
                </li>
            </a>
            <a class="tab_link" href="/futsal-admin/bookings/tomorrow">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom__tab" id="tomorrow-tab" data-bs-toggle="tab"
                        data-bs-target="#tomorrow" type="button" role="tab" aria-controls="tomorrow"
                        aria-selected="false">Tomorrow</button>
                </li>
            </a>
            <a class="tab_link" href="/futsal-admin/bookings/day-after">
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom__tab" id="after-tab" data-bs-toggle="tab" data-bs-target="#after"
                        type="button" role="tab" aria-controls="after" aria-selected="false">Day After</button>
                </li>
            </a>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tomorrow" role="tabpanel" aria-labelledby="tomorrow-tab">
                <div class="row gy-4 my-4">
                    @foreach ($time as $time)
                        <div class="col-3">
                            <button class="btn" style="width: 100%" data-bs-toggle="modal" data-bs-target="#confirm-modal">
                                <div class="card" style="color:white;background:#2bae66ff">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $time->book_time }}</h5>
                                        <p>Available</p>
                                    </div>
                                </div>
                            </button>

                            <div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="confirmLabel">Confirm Booking?</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>


                                    <form method='post' action="/futsal-admin/bookings/bookFutsal">
                                        @csrf
                                        <div class="modal-body">


                                        <input name='book_date' value={{ $date }} type="hidden" />
                                            <input name='futsal_id' value={{ $futsal->id }} type="hidden" />
                                            User: <select required class="form-select" name="booker_id">
                                                <option value="">Select a user</option>
                                                @foreach ($users as $user)
                                                    <option value={{$user->id}}>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <input name='book_time' value={{ $time->book_time }} type="hidden" />
                                            <input name='isBooked' value={{ 1 }} type="hidden" />
                                        </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        {{-- <form method='post' action="/book-futsal">
                                            @csrf
                                            <input name='date' value={{ $date }} type="hidden" />
                                            <input name='futsal_id' value={{ $futsal->id }} type="hidden" />
                                            <input name='booker_id' value={{ Auth::user()->id }} type="hidden" />
                                            <input name='time' value={{ $time->time }} type="hidden" />
                                            <button class="btn btn-primary">Confirm</button>
                                        </form> --}}


                                            <button type="submit" class="btn btn-primary">Confirm</button>


                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                    @endforeach
                    <br />
                    <h3>{{ $booked_time ? 'Booked Sessions' : '' }}</h3>
                    @foreach ($booked_time as $time)
                        <div class="col-3">

                                {{-- @csrf
                            <input name='date' value={{$today}} type="hidden" />
                            <input name='futsal_id' value={{$futsal->id}} type="hidden" />
                            <input name='booker_id' value={{Auth::user()->id}} type="hidden" />
                            <input name='time' value={{$time->time}} type="hidden" />
                            <input name='isBooked' value={{1}} type="hidden" /> --}}
                                {{-- <input name='startTime' value="{{$i}}:00" type="hidden" />
                            <input name='endTime' value="{{$i+1}}:00" type="hidden" /> --}}
                                <button class="btn" style="width: 100%"  data-bs-toggle="modal" data-bs-target="#cancel-modal">
                                    <div class="card" style="color:white;background:red">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $time->book_time }}</h5>
                                            <p>Booked</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="modal fade" id="cancel-modal" tabindex="-1" aria-labelledby="cancelLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="cancelLabel">Confirm Cancel?</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method='post' action="/futsal-admin/bookings/cancel-booking/{{$time->id}}">
                                            @csrf
                                        <div class="modal-body">
                                          Remarks: <textarea class="form-input col-12" name='remarks' placeholder="Enter a remark..." ></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            {{-- <form method='post' action="/book-futsal">
                                                @csrf
                                                <input name='date' value={{ $date }} type="hidden" />
                                                <input name='futsal_id' value={{ $futsal->id }} type="hidden" />
                                                <input name='booker_id' value={{ Auth::user()->id }} type="hidden" />
                                                <input name='time' value={{ $time->time }} type="hidden" />
                                                <button class="btn btn-primary">Confirm</button>
                                            </form> --}}
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </form>
                        </div>
                    @endforeach

                </div>

            </div>
        @endsection
