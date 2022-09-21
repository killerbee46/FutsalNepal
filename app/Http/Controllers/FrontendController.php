<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\User;
use App\Models\Time;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::all();
        $userCount = count(User::all());
        $futsalCount = count($futsal);
        $bookingCount = count(Booking::all());
        $avg = 0;

        if (auth()->check()) {

            $bookings = Booking::where('booker_id',auth()->user()->id)->get();
            $total_booking = count($bookings);
            $total_price = 0;
            foreach ($bookings as $book) {
                $total_price = $total_price + $book->price;

            }
            if($total_booking !=0){
                $avg = $total_price / $total_booking ;
            }
            else{
                $avg = 0;
            }
            if ($avg >= 500 && $avg <= 1000 ) {
                $high = 1000;
                $low = 500;
            }
            else if ($avg >= 1000 && $avg <= 1500 ) {
                $high = 1500;
                $low = 1000;
            }
            else if ($avg >= 1500 && $avg <= 2000 ) {
                $high = 2000;
                $low = 1500;
            }
            else{
                $high = 3000;
                $low = 0;
            }


            $recommender = Futsal::where('price','<=',$high)->where('price','>=',$low)->get();
        }
        else{
            $recommender = [];
        }

       return view('frontend.index',compact('futsal','today','userCount','futsalCount','bookingCount','recommender'));
    }
    public function futsals()
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::all();
       return view('frontend.futsal.futsals',compact('futsal','today'));
    }
    public function futsalDetail($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::where('id', $id)->first();
        return view('frontend.futsal.futsal-detail',compact('futsal','today'));
    }

    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        // dd($user);
        return view('frontend.profile',compact('user'));
    }
    public function howItWorks()
    {
        return view('frontend.howItWorks');
    }

}
