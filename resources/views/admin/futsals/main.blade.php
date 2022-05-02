@extends('admin.adminmaster')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class='table table-shaded' style="width:90%;margin:auto">
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

@endsection
