@extends('frontend.template')

@section('content')

<div class="container">
    <x-filter />

    <h3 class="py-2">Select from multiple Futsals</h3>
    <div class="row gy-5">
        @for($i = 0; $i < 20; $i++)
        <div class="col-4">
            <x-futsal-card />
        </div>
        @endfor
    </div>
</div>

@endsection
