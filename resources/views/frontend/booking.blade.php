@extends('frontend.template')

@section('content')

<div class="container py-5">
    <h3>White Horse Futsal</h3>
    <table class="table">
        <div class="row gy-4">
            @for($i = 0; $i < 10 ; $i ++) <div class="col-3">
                <x-time-card />
        </div>
        @endfor
</div>
</table>
</div>

@endsection
