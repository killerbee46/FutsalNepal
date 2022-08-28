@extends('admin.adminmaster')
@section('title')
Profile
@endsection
@section('content')
<div>

    <div class="row justify-content-center">
        <div class="col-6">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle" width="50%" src={{ auth()->user()->profile_pic ? asset('/images/users/'.auth()->user()->profile_pic) : asset('/images/default.png')}} alt="">
                    <!-- Profile picture help block-->
                    <h3>{{auth()->user()->name}}</h3>
                    <p><a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a></p>
                    <p><a href="telto:{{auth()->user()->phone}}">{{auth()->user()->phone}}</a></p>
                </div>
            </div>
        </div>
</div>
@endsection
