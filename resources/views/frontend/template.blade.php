<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        body {
            font-family: Poppins;
        }

        .go_navbar {
            background: rgb(43, 174, 102);
            position: sticky;
            top: 0;
            z-index: 10;
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
        .banner-img{
            width: 100%;
            height: 92vh;
        }
        .nav-link.get-started{
            background: green;
            color: white;
        }
        .nav-link.get-started:hover{
            background: white;
            color: green;
        }
        .nav-link.get-started:focus{
            background: white;
            color: green;
        }

        .cover-slider{
            background:linear-gradient(to left, rgba(0, 0, 0, 0.541), transparent);
            position: relative;
            height: 300px;
            overflow: hidden;
        }
        .cover-slider .banner-img{
            margin-top: -300px;
            position: relative;
            z-index: -1;
        }
        .cover-slider .text{
            position: absolute;
            top: 30px;
            right: 130px;
            text-align: right;
        }
        .cover-slider .slider-title{
            font-weight: 600;
            font-size: 60px;
            color:white;
        }
        .cover-slider .slider-sub-title{
            color: white;
            font-weight: 600;
            font-size: 38px;
        }

        .profile-card-2 {
    max-width: 300px;
    height: 350px;
    background-color: #FFF;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    background-position: center;
    overflow: hidden;
    position: relative;
    margin: 0;
    cursor: pointer;
    border-radius: 10px;
}

.profile-card-2.col-3{
    margin: 20px 10px;
    padding: 0;
}
.profile-card-2 img {
    transition: all linear 0.25s;
    height: 100%;
    margin: 0;
}

.profile-card-2 .profile-name {
    position: absolute;
    left: 30px;
    bottom: 90px;
    font-size: 24px;
    color: #FFF;
    text-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
    font-weight: bold;
    transition: all linear 0.25s;
}

.profile-card-2 .profile-button-1 {
    position: absolute;
    bottom: 30px;
    left: 30px;
    color: #FFF;
    transition: all linear 0.25s;
}

.profile-card-2 .profile-username {
    position: absolute;
    bottom: 80px;
    left: 30px;
    color: #FFF;
    font-size: 13px;
    transition: all linear 0.25s;
}

.profile-card-2:hover .profile-name {
    bottom: 100px;
}

.profile-card-2:hover .profile-username {
    bottom: 90px;
}

.profile-card-2:hover .profile-button-1 {
    bottom: 40px;
}
.stats{
    background: rgb(12, 173, 79);
    padding: 0;
    text-align: center;
}
.stats .col-4{
    padding: 10px;
    border: 1px solid rgba(128, 128, 128, 0.438);
}
.stats .title{
    color: white;
    font-size: 24px;
    font-weight: 600;
}
.stats .number{
    color: aliceblue;
    margin-top: -10px;
    font-size: 30px;
    font-weight: 600;
}
.hiw-section{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.hiw-section .number{
    font-size: 30px;
    background: #ff3300;
    color: wheat;
    border-radius: 50%;
    padding: 10px 25px;
    width: fit-content;
}
.hiw-section .text{
    font-size: 30px;
    font-weight: 600;
    padding: 5px 10px;
    width: fit-content;
}
.map-responsive{
    overflow:hidden;
    padding-bottom:50%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
.dropdown-toggle::after{
content: none !important;
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
                            <a class="nav-link" href="/how-it-works">How It Works</a>
                        </li>
            </nav>
            <form class="d-flex" method="POST" action="/search">
                @csrf
                <input name="keyword" class="form-control me-2" type="search" placeholder="Search by name or location"
                    aria-label="Search">
                <button class="btn btn__primary__outlined" type="submit">Search</button>
            </form>
            {{-- <div>
            <div class="nav-item dropdown custom">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:50%; padding:10px 15px; overflow:hidden;">

                    <div>
                        <img width="20" src="{{ asset('/images/notification-icon.webp') }}">
                        <span class="position-absolute top-10 start-20 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                    style="position: absolute;right: 0; left: auto;">
                    <li><a class="dropdown-item">You have been de-activated due to pending penalty</a></li>
                    <li><a class="dropdown-item">Successfully Registered</a></li>
                </ul>
            </div>
        </div> --}}
            @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown custom">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;color: aliceblue;">
                            <img src="{{asset('/images/users/'.Auth::user()->profile_pic)}}"
                                alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                            style="position: absolute;right: 0; left: auto;">
                            <li><a class="dropdown-item" href="/user/{{ Auth::user()->id }}/profile">Profile</a></li>
                            @if (Auth()->user()->isAdmin())
                            <li><a class="dropdown-item" href="/admin">Admin Control</a></li>
                            @endif
                            @if (Auth()->user()->isFutsal())
                            <li><a class="dropdown-item" href="/futsal-admin">Futsal Admin</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                        </ul>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-default get-started" href="#" id="navbarDropdown"
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
