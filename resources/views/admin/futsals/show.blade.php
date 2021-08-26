<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show View</title>
</head>
<body style="width: 90%;">
  <h1>{{$futsals->name}}</h1>
  <div><img width='700px' height='500px' src="{{asset('/images/futsals/'.$futsals->photo)}}" alt=""></div>
  <h3>{{$futsals->area}},{{$futsals->city}}</h3>  
</body>
</html>