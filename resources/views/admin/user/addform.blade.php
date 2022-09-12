@extends('admin.adminmaster')
@section('title')
    Add User | Admin
@endsection
@section('content')
<div class="container">

      <form method="POST"
      action="{{url('admin/users/add-user/')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" type="text" placeholder="Text input" name ="name" value="{{old('name')}}">
            </div>
          </div>

      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" placeholder="Email input" value="{{old('email')}}" name="email">
        </div>
      </div>

      <div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" type="text" placeholder="Password"  value="{{old('password')}}" name="password">
        </div>
      </div>

       <div class="field">
        <label class="label">Mobile</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name="mobile"  value="{{old('mobile')}}">
        </div>
      </div>

<div class="field">
    <label class="label">Profile Pic</label>
    <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic"  value="{{old('profile_pic')}}">
          {{-- <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label> --}}
        </div>
      </div>
</div>

      {{-- <div class="field">
        <label class="label">Status:</label>
        <div class="control">
          <div class="select">
            <select name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
      </div> --}}


      <div class="field">
        <div class="control">
        <label class="label">Role:</label>
          <label class="radio">
            <input type="radio"  name="role" value="1" checked>
            Normal User
          </label>
          <label class="radio">
            <input type="radio"  name="role" value="2">
            Futsal Owner
          </label>
        </div>
      </div>
    <button class="button is-success">Submit</button>
  </form>

</div>

@stop
