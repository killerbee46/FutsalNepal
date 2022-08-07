@extends('auth.auth-container')
@section('title')
Login to Go Futsal
@endsection

@section('body')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

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
                <div class="col">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
                <div class="col">
                    <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            </div>

        <div class="flex items-center justify-end mt-4">

            <div class="row align-items-md-center py-2">
                <div class="col">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Dont have an account?') }}
                </a>
                </div>
                <div class="col">
                    <Button class="btn btn-primary">Login</Button>
                </div>
            </div>



        </div>
    </form>
@endsection
