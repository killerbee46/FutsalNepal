@extends('admin.adminmaster')
@section('content')

@section('title') Futsal List

@endsection

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form style="float: right;" method="POST"
action="{{url('admin/futsal/search-futsal')}}" >
    @csrf
        <input class="input is-normal" type="text" placeholder="Search..." style="width: 300px; " name="searched">
        <button class="btn btn-primary" >Search</button>

</form>
<div class="buttons" style="float: right;">

  <a href="{{url('admin/futsal/create')}}" class="button is-primary">Add Futsal</a>

</div>
<h2>List of Futsals</h2>

<table class='table table-striped'>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Address</th>
    <th colspan="2">Actions</th>
</tr>
@foreach ($futsals as $futsal )
    <tr>
        <td>{{$futsal->name}}</a></td>
        <td><a class="text no_deco primary" href="mailto:{{$futsal->email}}">{{$futsal->email}}</a></td>
        <th><a class="text no_deco primary" href="callto:{{$futsal->contact}}">{{$futsal->contact}}</a></th>
    <td>{{$futsal->area}}, {{$futsal->city}}</td>
        <td><a href="/admin/futsal/{{$futsal->id}}/edit"><button class="btn btn-primary">Edit</button></a></td>

        <form method="POST" action="/admin/futsal/{{$futsal->id}}/delete">
        @csrf
        <td><button class='btn btn-danger'>Delete</button></td>
        </form>


    </tr>
@endforeach

</table>

@endsection
