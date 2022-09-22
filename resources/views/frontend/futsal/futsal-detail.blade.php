@extends('frontend.template')

@section('title')
    {{ $futsal->name }}
@endsection

@section('content')
    @php
        use Carbon\Carbon;
        $user = auth()->user();
    @endphp

    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <style>
            div.stars {
                width: 200px;
                display: inline-block;
            }

            input.star {
                display: none;
            }

            label.star {
                float: right;
                padding: 10px;
                font-size: 18px;
                color: #444;
                transition: all .2s;
            }

            input.star:checked~label.star:before {
                content: '\f005';
                color: rgb(0, 151, 8);
                transition: all .25s;
            }

            input.star-5:checked~label.star:before {
                color: rgb(0, 131, 39);
                text-shadow: 0 0 20px rgb(5, 58, 0);
            }

            input.star-1:checked~label.star:before {
                color: rgb(255, 0, 0);
            }

            label.star:hover {
                transform: rotate(-15deg) scale(1.3);
            }

            label.star:before {
                content: '\f006';
                font-family: FontAwesome;
            }
        </style>
    </head>
    <div class="container">
        <div class="row py-5">
            <div class="col">
                <img width="100%" style="border-radius:5px;" src="{{ asset('/images/futsals/' . $futsal->image) }}"
                    alt="lol" />
            </div>
            <div class="col">
                <h1>{{ $futsal->name }}</h1>
                <p>{{ $futsal->area }}, {{ $futsal->city }}</p>
                <a href="callto:{{ $futsal->contact }}">{{ $futsal->contact }}</a><br />
                <a href="mailto:{{ $futsal->email }}">{{ $futsal->email }}</a>
                <hr />
                <p>
                    We try to provide quality services to our customers try it out by booking our futsal and getting the
                    experience.
                </p>
                <a href="/futsals/{{ $futsal->id }}/book-today" class="btn btn-success">Book Now</a>

            </div>
        </div>
        <div class="container-fluid">
            <div class="map-responsive">
                <iframe
                    src={{ "https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=$futsal->map" }}
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        @auth
            <div class="card" style="padding: 20px; margin: 20px 0">

                <form method="POST" action="{{ url('futsal/review/' . $futsal->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-size: 18px;font-weight: 500">Review</label>
                        <div>Rate:</div>
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="star" value=1 />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" value=2 />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" value=3 />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" value=4 />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" value=5 />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                        <textarea type="text" class="form-control" placeholder="Type review here..." name="comment" required="true""></textarea>
                    </div>
                    <button class="btn btn-success" style="margin: 20px 0">Post Review</button>
                </form>
            </div>
        @endauth

        <div style="margin-top: 30px;">
            <div class="col-lg-12">
                <div class="card" style="color: rgb(43, 174, 102);">
                    <div class="card-body text-center">
                        <h4 class="card-title">Latest Reviews</h4>
                    </div>
                    @foreach ($comments as $comment)
                        <div class="comment-widgets">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="{{ asset('/images/users/' . $comment->user->profile_pic) }}" alt="O"
                                        width="50" class="rounded-circle" style="border-radius: 50%;overflow: hidden;">
                                </div>
                                <div class="comment-text w-100">
                                    <span class="m-b-15 d-block">{{ $comment->comment }}</span>
                                    <div class="stars" aria-readonly="true">
                                        <input class="star star-5" id="star-5" type="radio" name="star" value=5 />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" value=4 />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" value=3 />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star"
                                            value=2 />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star"
                                            value=1 />
                                        <label class="star star-1" for="star-1"></label>
                                    </div>
                                    <div class="comment-footer"> <span
                                            class="text-muted float-right">{{ Carbon::create($comment->created_at)->diffForHumans() }}</span>
                                        @if ($user == null)
                                            <div></div>
                                        @else
                                            @if ($comment->user_id == $user->id)
                                                <a href="{{ url('/deletecomment/' . $comment->id) }}"
                                                    class="btn btn-default"
                                                    style="float: right;align-content: center"><button type="button"
                                                        class="btn btn-danger">Delete</button></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- Comment Row -->

                        </div> <!-- Card -->
                        <br>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
