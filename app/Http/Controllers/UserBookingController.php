<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\Time;
use Carbon\Carbon;
use Auth;

class UserBookingController extends Controller
{
    public function booking_today($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        $date = Carbon::now()->format('Y-m-d');
        // $today->setTimezone('Asia/Kathmandu');
        $booking = Booking::all()->where('futsal_id',$id)->where('date',$date);
        $time = DB::select("SELECT * FROM times WHERE time NOT IN ( SELECT time from booking where isBooked = 1 AND date = $date )");
        $booked_time = DB::select("SELECT * FROM times WHERE time IN( SELECT time from booking where isBooked = 1 AND date = $date )");
        return view('frontend.booking.booking_today',compact('futsal','booking','time', 'date','booked_time'));
    }
    public function booking_tomorrow($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        // $today->setTimezone('Asia/Kathmandu');
        $date = Carbon::now()->addDay()->format('Y-m-d');
        $booking = Booking::all()->where('futsal_id',$id)->where('date',$date);
        $time = DB::select("SELECT * FROM times WHERE time NOT IN ( SELECT time from booking where isBooked = 1 AND date = $date )");
        $booked_time = DB::select("SELECT * FROM times WHERE time IN( SELECT time from booking where isBooked = 1 AND date = $date )");
        return view('frontend.booking.booking_tomorrow',compact('futsal','booking','time', 'date','booked_time'));
    }
    public function booking_after($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        // $today->setTimezone('Asia/Kathmandu');
        $date = Carbon::now()->addDays(2)->format('Y-m-d');
        $booking = Booking::all()->where('futsal_id',$id)->where('date',$date);
        $time = DB::select("SELECT * FROM times WHERE time NOT IN ( SELECT time from booking where isBooked = 1 AND date = $date )");
        $booked_time = DB::select("SELECT * FROM times WHERE time IN( SELECT time from booking where isBooked = 1 AND date = $date )");
        return view('frontend.booking.booking_after',compact('futsal','booking','time', 'date','booked_time'));
    }

    public function futsalBooking(Request $request){
        $request->validate([
            'date' => 'required',
            'futsal_id' => 'required',
            'booker_id' => 'required',
            'time'=> 'required',
            'isBooked' => 'required'
        ]);

        $booking = new Booking();
        $booking->futsal_id = $request->futsal_id;
        $booking->booker_id = $request->booker_id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->isbooked = 1;
        $booking->save();

        if($booking->save()){
            //Redirect with Flash message
            return redirect("/my-bookings")->with('status', 'Futsal booked Successfully!');
        }
        else{
            return redirect("/futsals/$request->futsal_id/book-today")->with('status', 'Could not book futsal at the moment!');
        }
    }

    public function cancelBooking(){

    }

    public function userBooking(){
        $booking_list = Booking::where('booker_id',2)->get();
        return view('frontend.booking.user-bookings',compact('booking_list'));
    }
}
