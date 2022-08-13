<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bluma css cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

    <!-- laravel css   -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- boostrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</head>


    <!-- <nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="navbar-item" href="/admin">
                <b>Admin Control</b>
            </a>
            <div class="navbar-burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/admin/users">
                        Users
                    </a>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="https://bulma.io/documentation/overview/start/">
                       Futsals
                    </a>
                    <img src="{{asset('/images/'.Auth::user()->profile_pic)}}">
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">


                    </div>
                </div>
            </div>
        </div>
    </nav> -->

    <div class="row">
        <div class="d-flex flex-column p-3 text-white bg-dark col-md-2" style="position: relative;height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">GO Futsal</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto menu">
                <li class="nav-item">
                    <a href="/futsal-admin" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/futsal-admin/futsal" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Futsal
                    </a>
                </li>
                <li>
                    <a href="/futsal-admin/bookings" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Booking
                    </a>
                </li>
                <li>
                    <a href="/futsal-admin/bookings/all" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        All Bookings
                    </a>
                </li>
                <li>
                    <a href="/futsal-admin/bookings/cancelled" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Cancelled
                    </a>
                </li>
                <li>
                    <a href="/futsal-admin/{{Auth::user()->id}}/profile" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Profile
                    </a>
                </li>
            </ul>
            <hr>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false" style="color: white;">
                <img src="{{ Auth::user()->profile_pic ? asset('/images/users/'.Auth::user()->profile_pic) : asset('/images/default.png')}}"
                    alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{Auth::user()->name}}</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/futsal-admin/{{Auth::user()->id}}/profile">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
            </ul>
        </div>

        <div class="col p-0">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid" style="display: flex;">
                    <div class="navbar-brand"></div>
                    <div>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="position: relative;color: aliceblue;">
                            <img src="{{ Auth::user()->profile_pic ? asset('/images/users/'.Auth::user()->profile_pic) : asset('/images/default.png')}}"
                                alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{Auth::user()->name}}</strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                            style="position: absolute;right: 0; left: auto;">
                            <li><a class="dropdown-item" href="/futsal-admin/{{Auth::user()->id}}/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="p-3">
                @yield('content')
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).on('change', '.custom-file-input', function (event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        })
        $(document).ready(function () {
            $('.nav_w3ls .menu').find('a.active').removeClass('active');

            var sPath = window.location.pathname;
            var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
            $('.nav_w3ls .menu').find('a[href=' + sPage + ']').addClass('active');
        });
    </script>
    </style>

</body>

</html>
