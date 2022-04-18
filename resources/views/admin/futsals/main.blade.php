<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class='table table-shaded' border="1px solid black" style="width:90%;margin:auto">
<tr>
    <th>Name</th>
    <th>Owner Name</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Embed Map</th>
    <th colspan="2">Actions</th>
</tr>
@foreach ($futsals as $futsal )
    <tr>
        <td><a href="futsal/{{$futsal->id}}">{{$futsal->futsal_name}}</a></td>
        <td>{{$futsal->owner_name}}</td>
        <th>{{$futsal->contact}}</th>
    <td>{{$futsal->area}}, {{$futsal->city}}</td>
    <td>{{$futsal->map}}</td>
        <td><a href="/futsal/{{$futsal->id}}/edit"><button class="btn btn-primary">Edit</button></a></td>

        <form method="POST" action="/futsal/{{$futsal->id}}">
        @csrf
        @method('delete')
        <td><button class='btn btn-danger'>Delete</button></td>
        </form>


    </tr>
@endforeach

</table>
<a href="futsal/create" class="btn btn-success" style="margin-left:5%;margin-top:5px;" >Add New Futsal</a>
</body>
</html>
