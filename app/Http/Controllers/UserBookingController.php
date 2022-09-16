<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\User;
use App\Models\Time;
use Carbon\Carbon;
use Auth;

class UserBookingController extends Controller
{
    public function booking_today($id)
    {
        if(auth()->user()->status != "approved"){
            return redirect('/')->with('error',  'You have been '.auth()->user()->status.' please contact the admin.');
        }
else{
        $futsal = Futsal::where('id', $id)->first();
        $date = Carbon::now()->format('Y-m-d');
        // $today->setTimezone('Asia/Kathmandu');
        $booking = Booking::all()->where('futsal_id',$id)->where('date',$date);
        $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
        // $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
        $my_booking = DB::select('SELECT * FROM booking where isBooked = 1 AND book_date = ? AND futsal_id = ? AND booker_id =?',[$date,$id,Auth::user()->id]);
        $booking_count =  count($my_booking);
        return view('frontend.booking.booking_today',compact('futsal','booking','time', 'date', 'my_booking','booking_count','my_booking'));
 } }
    public function booking_tomorrow($id)
    {

    $futsal = Futsal::where('id', $id)->first();
    // $today->setTimezone('Asia/Kathmandu');
    $date = Carbon::now()->addDay()->format('Y-m-d');
    $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
    // $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
    $my_booking = DB::select('SELECT * FROM booking where isBooked = 1 AND book_date = ? AND futsal_id = ? AND booker_id =?',[$date,$id,Auth::user()->id]);
    $booking_count =  count($my_booking);
    return view('frontend.booking.booking_tomorrow',compact('futsal','time', 'date','my_booking','booking_count'));
    }
    public function booking_after($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        // $today->setTimezone('Asia/Kathmandu');
        $date = Carbon::now()->addDays(2)->format('Y-m-d');
        $booking = Booking::all()->where('futsal_id',$id)->where('date',$date);
        $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
        // $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$id]);
        $my_booking =DB::select('SELECT * FROM booking where isBooked = 1 AND book_date = ? AND futsal_id = ? AND booker_id =?',[$date,$id,Auth::user()->id]);

        $booking_count =  count($my_booking);
        return view('frontend.booking.booking_after',compact('futsal','booking','time', 'date','my_booking','booking_count'));
    }

    public function futsalBooking(Request $request){
        $request->validate([
            'book_date' => 'required',
            'futsal_id' => 'required',
            'book_time'=> 'required',
            'isBooked' => 'required'
        ]);
        $booking = new Booking();
        $booking->futsal_id = $request->futsal_id;
        $booking->booker_id = Auth::user()->id;
        $booking->book_date = $request->book_date;
        $booking->book_time = $request->book_time;
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

    public function cancelBooking(Request $request,$id){
        $booking = Booking::findOrFail($id);
        $user = User::findOrFail($booking->booker_id);
        $futsal = Futsal::findOrFail($booking->futsal_id);
        $penalty = (20/100)*$futsal->price;
        $booking->penalty = $penalty;

        $booking->isBooked = 0;
        $user->penalty = $user->penalty + $penalty;

        if($user->penalty >= $futsal->price) {
            $user->status = "deactivated";
        }
        else{
            $user->status = $user->status;
        }

        if($booking->save() && $user->save()){
            //Redirect with Flash message
            return redirect("/my-bookings")->with('status', 'Booking cancelled Successfully!');
        }
        else{
            return redirect("/futsals/$booking->futsal_id/book-today")->with('status', 'Could not cancel booking at the moment!');
        }
    }

    public function userBooking(){
        $booking_list = Booking::where('booker_id',auth()->user()->id)->get();
        return view('frontend.booking.user-bookings',compact('booking_list'));
    }

    public function searchFutsal(Request $request){
        $keyword=$request->keyword;
        $futsal= Futsal::orWhere('name','Like',"%$keyword%")->orWhere('city','Like',"%$keyword%")->orWhere('area','Like',"%$keyword%")->get();
        $count = $futsal->count();
        // dd($count);
        if($count === 0){
            $message ="Sorry! No Match For Your Search";
        }
        else{
            $message = "";
        }
        return view('frontend.futsal.futsal-search',compact('futsal','keyword','message'));
    }
}
