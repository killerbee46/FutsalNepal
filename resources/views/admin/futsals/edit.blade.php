@extends('admin.adminmaster')
@section('content')

@section('title') Edit Futsal

@endsection

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif

    <div class="container" width='50%'>
        <form action="/admin/futsal/edit/{{$futsals->id}}" method="POST" enctype='multipart/form-data'>
        <h3>Edit the Futsal Information</h3>
            <hr width='50%'>
            @csrf

            @error('name')
            <div class="alert alert-danger">Please enter the name of futsal</div>
            @enderror
            @error('owner_name')
            <div class="alert alert-danger">Please enter the owner's name</div>
            @enderror
            @error('contact')
            <div class="alert alert-danger">Please add a contact number</div>
            @enderror
            <div align='left'>
            <h5>Name</h5>
            <input type="text" name="name" style="width: 500px;height: auto;" value="{{$futsals->name}}"><br>
            @error('name')
            <div class="alert alert-danger">Please enter the name of futsal</div>
            @enderror
            <h5>Email</h5>
            <input type="text" name="email" style="width: 500px;height: auto;" value="{{$futsals->email}}">
            <h5>Contact</h5>
            <input type="text" name="contact" style="width: 500px;height: auto;" value="{{$futsals->contact}}">
            <div align='center' style="display: flex;justify-content: left; width: 60%; margin:10px">
                <div><h5>City</h5>
                    <select name="city">
                        <option>Kathmandu</option>
                    </select></div>
                <div style='margin-left:200px'><h5>Area</h5>
                    <select name="area">
                    <option selected>{{$futsals->area}}</option>
                        <option>Kapan</option>
                        <option>Gokarna</option>
                        <option>Chabahil</option>
                        <option>Jorpati</option>
                    </select></div>
            </div>

            <h5>Map</h5>
            <input type="text" name="map" style="width: 500px;height: auto;" value="{{$futsals->map}}">
            <div class="custom-file">
                <h5>Photo</h5>
                <input type="file" class="custom-file-input" id="inputGroupFile04"
                    aria-describedby="inputGroupFileAddon04" name="photo">
            </div>
        </div>
            <br>
            <div>
                <button class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
