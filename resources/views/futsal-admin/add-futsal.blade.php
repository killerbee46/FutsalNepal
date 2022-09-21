@extends("frontend.template")

@section('title')
    Add Futsal
@endsection

@section('content')

<div class="container" width='50%' style="margin-top:30px; margin-bottom:40px; ">
    <form action="/futsal/create-futsal" method="POST" enctype='multipart/form-data'>
        <h3>Add New Futsal</h3>
        <hr width='50%'>
        @csrf
        <div align='left'>

            <h5>Name</h5>
            <input type="text" name="name" style="width: 50%;height: auto;" value="{{old('name')}}"><br>
            @error('name')
            <div class="alert alert-danger" style="width: 50%;height: auto;">Please enter the futsal name</div>
            @enderror
            <h5>Email</h5>
            <input type="text" name="email" style="width: 50%;height: auto;" value="{{old('email')}}">
            @error('email')
        <div class="alert alert-danger" style="width: 50%;height: auto;">Please enter the email</div>
        @enderror
            <h5>Contact</h5>
            <input type="text" name="contact" style="width: 50%;height: auto;" value="{{old('contact')}}">
            @error('contact')
        <div class="alert alert-danger"  style="width: 50%;height: auto;">Please enter the contact</div>
        @enderror
        <h5>Price</h5>
            <input type="number" name="price" style="width: 50%;height: auto;" value="{{old('price')}}">
            @error('contact')
        <div class="alert alert-danger"  style="width: 50%;height: auto;">Please enter the price</div>
        @enderror
            <div align='center' style="display: flex;justify-content: left;width: 60%;margin: 10px;">
                <div>
                    <h5>City</h5>
                    <select name="city" value="{{old('city')}}">
                        <option>Kathmandu</option>
                    </select>
                </div>
                <div style="margin-left: 200px;">
                    <h5>Area</h5>
                    <select name="area"  value="{{old('area')}}">
                        <option>Kapan</option>
                        <option>Gokarna</option>
                        <option>Chabahil</option>
                        <option>Jorpati</option>
                    </select>
                </div>
            </div>
            <h5>Map</h5>
            <input type="text" name="map" style="width: 50%;height: auto;" value="{{old('map')}}">
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
