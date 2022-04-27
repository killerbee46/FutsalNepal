@extends('frontend.template')

@section('content')

<div class="container">
    <div class="row py-5">
        <div class="col">
            <img width="100%" style="border-radius:5px;"
                src="https://media.istockphoto.com/photos/soccer-ball-on-a-corner-kick-line-on-an-artificial-green-grass-picture-id937948742?b=1&k=20&m=937948742&s=170667a&w=0&h=JCzGAQDP5U0DEhwmUcVAdqANmUOHWaLzZtGvmMzA0gg=" />
        </div>
        <div class="col">
            <center>
                <h1>White Horse Futsal</h1>
                <p>Nilopool, Kapan</p>
                <a href="callto:8989898989">8989898989</a><br />
                <a href="mailto:sugamsingh10@gmail.com">sugamsingh10@gmail.com</a>
            </center>
            <hr />
            <p>
                We try to provide quality services to our customers try it out by booking our futsal and getting the
                experience.
            </p>
            <a href="/futsals/1/book" class="btn btn-success">Book Now</a>

        </div>
    </div>
</div>

@endsection
