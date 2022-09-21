<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');
body {
    font-family: Poppins;
}
        .auth__container{
            height: auto;
            display: flex;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .auth__section{
            padding: 20px;
            height: fit-content;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            width: 35%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="auth__container">
        <div class="auth__section card">

            <div style="padding-bottom: 20px"><a href="/"><x-logo /></a> </div>
    @yield('body')
        </div>
</div>
</body>
</html>
