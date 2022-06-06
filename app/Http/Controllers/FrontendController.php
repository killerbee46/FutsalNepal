<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Futsal;
use App\Models\Booking;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        $futsal = Futsal::all();
       return view('frontend.index',compact('futsal'));
    }
    public function futsals()
    {
        $futsal = Futsal::all();
       return view('frontend.futsals',compact('futsal'));
    }
    public function futsalDetail($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        return view('frontend.futsal-detail',compact('futsal'));
    }
    public function booking($id)
    {
        $futsal = Futsal::where('id', $id)->first();
        $booking = Booking::all()->where('futsal_id',$id);
        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $after = Carbon::now()->addDays(2)->format('Y-m-d');
        $time = ['5-6','6-7','7-8','8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16'];
        return view('frontend.booking',compact('futsal','booking','time', 'today', 'tomorrow','after'));
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
        $booking->isbooked = $request->isBooked;
        $booking->save();

        if($booking->save()){
            //Redirect with Flash message
            return redirect("/futsals/$request->futsal_id/book")->with('status', 'Futsal booked Successfully!');
        }
        else{
            return redirect("/futsals/$request->futsal_id/book")->with('status', 'Could not book futsal!');
        }
    }
}
