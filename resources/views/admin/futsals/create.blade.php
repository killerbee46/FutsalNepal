@extends('admin.adminmaster')
@section('content')

@section('title') Add Futsal

@endsection

    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif

    <div class="container" width='50%'>
        <form action="/admin/futsal/add-futsal" method="POST" enctype='multipart/form-data'>
            <h3>Add New Futsal</h3>
            <hr width='50%'>
            @csrf

            @error('name')
            <div class="alert alert-danger">Please enter the title</div>
            @enderror
            @error('owner_name')
            <div class="alert alert-danger">Please enter the article</div>
            @enderror
            @error('contact')
            <div class="alert alert-danger">Please add an image file</div>
            @enderror

            <div align='left'>
                <h5>Name</h5>
                <input type="text" name="name" style="width: 500px;height: auto;"><br>
                <h5>Owner Name</h5>
                <input type="text" name="owner_name" style="width: 500px;height: auto;">
                <h5>Contact</h5>
                <input type="text" name="contact" style="width: 500px;height: auto;">
                <div align='center' style="display: flex;justify-content: left;width: 60%;margin: 10px;">
                    <div>
                        <h5>City</h5>
                        <select name="city">
                            <option>Kathmandu</option>
                        </select>
                    </div>
                    <div style="margin-left: 200px;">
                        <h5>Area</h5>
                        <select name="area">
                            <option>Kapan</option>
                            <option>Gokarna</option>
                            <option>Chabahil</option>
                            <option>Jorpati</option>
                        </select>
                    </div>
                </div>
                <h5>Map</h5>
                <input type="text" name="map" style="width: 500px;height: auto;">
                <div class="custom-file">
                    <h5>Photo</h5>
                    <input type="file" class="custom-file-input" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" name="image">
                </div>
            </div>
            <br>
            <div>
                <button class="btn btn-success">Add Futsal</button>
            </div>
        </form>
    </div>
@endsection
