@extends('auth.auth-container')

@section('title')
Register to Go Futsal
@endsection

@section('body')
<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('register') }}">
    @csrf

        <div class="row align-items-md-center py-2">
            <div class="col-md-4"> <x-label for="name" :value="__('Name')" /></div>
            <div class="col-md-8"> <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus /></div>
        </div>


    <div class="row align-items-md-center py-2">
        <div class="col-md-4"><x-label for="email" :value="__('Email')" /></div>
        <div class="col-md-8"> <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /></div>
    </div>
    <div class="row align-items-md-center py-2">
            <div class="col-md-4"> <x-label for="password" :value="__('Password')" /></div>
            <div class="col-md-8"> <x-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" /></div>
        </div>

        <div class="row align-items-md-center py-2">
            <div class="col-md-4"> <x-label for="password_confirmation" :value="__('Confirm Password')" /></div>
            <div class="col-md-8"> <x-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required /></div>
        </div>

        <div class="row align-items-md-center py-2">
            <div class="col-md-4">
                <x-label for="mobile" :value="__('Mobile')" />
            </div>
            <div class="col-md-8">
                <x-input id="mobile" class="block mt-1 w-full"
                type="number"
                name="mobile" />
            </div>
        </div>

        <div class="row align-items-md-center py-2">
            <div class="col-md-4">
                <x-label for="profile_pic" :value="__('Profile Picture')" />
            </div>
            <div class="col-md-8">
                <x-input style="background: transparent; box-shadow: none" id="profile_pic" class="block mt-1 w-full"
                type="file"
                name="profile_pic" />
            </div>
        </div>

        <div class="row align-items-md-center py-2">
            <div class="col-md-4"> Register As</div>
            <div class="col-md-7"> <span>
                <input type="radio" id="role" checked name="role" value="1"/> User
                </span>
                <span>
                <input type="radio" name="role" value="2"/> Futsal Owner
            </span>
        </div>
        <div class="row align-items-md-center py-2">
            <div class="col">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 text-success" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
            <div class="col">
                <Button class="btn btn-success">Register</Button>
            </div>

</form>
@endsection
