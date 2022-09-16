@extends('admin.adminmaster')
@section('content')
<div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="buttons" style="float: right;">
            {{-- <a href="{{url('admin/users/add-user')}}" class="button is-primary">Add User</a> --}}
        </div>
         <h2 style="color:blue">Search result </h2>

         <table class='table table-striped'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
            </tr>
            @foreach ($data as $futsal )
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
        <!--  <p>Red background </p> -->
</div>
 @stop
