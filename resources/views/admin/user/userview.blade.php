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

        <form style="float: right;" method="POST"
          action="{{url('admin/users/search-user/')}}" >
              @csrf
                  <input class="input is-normal" type="text" placeholder="Normal input" style="width: 300px; " name="searched">
                  <button class="btn btn-primary" >Search</button>

        </form>
        <div class="buttons" style="float: right;">

            <a href="{{url('admin/users/add-user')}}" class="button is-primary">Add User</a>

        </div>
         <h2>List of users</h2>


         <table class="table table-striped">
             <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
             </thead>

             @foreach($data as $user)

             @php
                $user->status === "blocked" ? (
                    [
                    $status="Blocked",
                    $background="red",
                    $option = [
                        // ["value" => 'approved', "label" =>"UnBlock"]
                        "approved"
                    ]
                    ]
                )
                :($user->status === "approved" ? (
                    [
                    $status="Approved",
                    $background="lime",
                    $option = [
        //                 ["value" => 'blocked', "label" =>"Block"],
        // ["value"=> 'deactivated', "label"=>"Deactivate"],
        "blocked",
        "deactivated"
                    ]
                    ]
                )
                :($user->status === "deactive" ? (
                    [
                    $status="Deactivated",
                    $background="purple",
                    $option = [
                        // ["value" => 'blocked', "label" =>"Block"],
                        // ["value"=> 'deactivated', "label"=>"Deactivate"],
                        "blocked",
                        "deactivated"
                    ]
                    ]
                ) :
                (
                    [
                        $status="Pending",
                        $background="rgb(151, 151, 151)",
                        $option = [
                        'approved',
                        'declined'
                    ]
                    ]

                )
                ))
                @endphp
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                            <div class="dropdown">
                                <button style="background: {{$background}}" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$status}}
                                </button>
                                <ul class="dropdown-menu">
                                  @foreach ($option as $opt)
                                  <li><span class="dropdown-item">
                                    <form method="POST" action="{{url('admin/users/change-status/'.$user->id."/".$opt)}}">
                                        @csrf
                                        <button class="btn" style="border: none; width:100%;text-align: left;">{{
                                            $opt == "approved" ? "Approve" :
                                            ($opt == "blocked"? "Block" :
                                            ($opt == "declined" ? "Decline" :
                                            ($opt == "deactivated" ? "Deactivate" :
                                            null)))}}</button>
                                    </form>
                                    </span></li>
                                  @endforeach
                                </ul>
                              </div>
                    </td>
                    <td>

                        <form method="post" action="{{url('admin/users/delete-user/'.$user->id)}}"  >
                            <a href="{{url('admin/users/edit-user/'.$user->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>

                </tr>

             @endforeach


         </table>

        <!--  <p>Red background </p> -->
</div>
{{ $data->links("pagination::bootstrap-4")}}
 @stop
