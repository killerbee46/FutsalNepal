<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Futsal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        body {
            font-family: Poppins;
        }

        .go_navbar {
            background: #2bae66ff;
        }

        .container.flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-item .nav-link {
            color: white;
        }

        .nav-item .nav-link:hover {
            background: rgb(62, 255, 149);
            color: black;
        }

        .btn.btn__primary__outlined {
            border: 1px solid white;
            background: #2bae66ff;
            color: white;
        }

        .btn.btn__primary__outlined:hover {
            border: 1px solid #2bae66ff;
            background: white;
            color: #2bae66ff;
        }

        .tab_link {
            text-decoration: none;
        }

        .nav-tabs .nav-link.custom__tab {
            color: black;
        }

        .nav-tabs .nav-link.custom__tab.active {
            color: #2bae66ff;
        }

        .logo:hover {
            opacity: 70;
            transform: scale(1.2)
        }

        .toggle_button.navbar-toggler-icon {
            color: white;
        }

        .card.custom__card {
            padding: 0;
            overflow: hidden;
            max-width: 350px;
            height: 400px;
        }
        .card__content{
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }
        .card-body.custom__card-body {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.699) 30%, transparent 100%);
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            color: white
        }

        .card-body.custom__card-body .pop_up {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 1s linear;
        }

        .card.custom__card:hover .card-body.custom__card-body .pop_up {
            visibility: visible;
            opacity: 1;
        }

        .card.custom__card:hover .card-img-top.card__cover {
            transform: scale(1.2);
            transition: ease-in-out 1s;
        }
        .card.custom__card .card-img-top.card__cover {
            transition: ease-in-out 1s;
        }
        .btn.book__button {
            border: 2px solid transparent;
            background: #2bae66ff;
            color: white;
        }

        .btn.book__button:hover {
            border: 2px solid transparent;
            background: #2bae66ff;
            color: black;
        }
        .card__link{
            text-decoration: none;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet/text" href="./styles.css " />
</head>

<body>

    <div class="go_navbar">
        <div class="container flex">
            <a class="navbar-brand" href="/">
                <x-logo />
            </a>
            <nav class="navbar go_navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggle_button">
                        <img width="20" src="{{ asset('/images/toggle.png') }}">
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/futsals">Futsals</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="/my-bookings">My Bookings</a>
                                </li>
                            @endauth
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/futsals">How to Book</a>
                        </li>
            </nav>
            <form class="d-flex" method="POST" action="/search">
                @csrf
                <input name="keyword" class="form-control me-2" type="search" placeholder="Search by name or location"
                    aria-label="Search">
                <button class="btn btn__primary__outlined" type="submit">Search</button>
            </form>
            @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown custom">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;color: aliceblue;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1200px-User_icon_2.svg.png"
                                alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                            style="position: absolute;right: 0; left: auto;">
                            <li><a class="dropdown-item" href="user/{{ Auth::user()->id }}/profile">Profile</a></li>
                            @if (Auth()->user()->isAdmin())
                            <li><a class="dropdown-item" href="/admin">Admin Control</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                        </ul>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-default" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Get Started
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/login">Login</a></li>
                            <li><a class="dropdown-item" href="/register">Register</a></li>
                            {{-- <li>
                                    <hr class="dropdown-divider">
                                </li> --}}
                        </ul>
                    </div>

                @endauth
            @endif
            </ul>

        </div>
    </div>
    </div>

    <div>
        @yield('content')
    </div>

</body>

</html>
