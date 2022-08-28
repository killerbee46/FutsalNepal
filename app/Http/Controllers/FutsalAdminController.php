<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class FutsalAdminController extends Controller
{

    public function index()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $booking = Booking::where('futsal_id',$futsal->id)->get();
        $booking_count = count($booking);
        $latest = Booking::where('futsal_id',$futsal->id)->orderBy("id","DESC")->paginate(7);
        return view('futsal-admin.index',compact('booking','booking_count',"latest"));
    }

    public function futsal(){
        $futsals = Futsal::where('owner_id', Auth::user()->id)->first();
        return view('futsal-admin.futsal',compact('futsals'));
    }

    public function booking()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $users = User::orderBy('name')->get();
        $date = Carbon::now()->format('Y-m-d');
        // $today->setTimezone('Asia/Kathmandu');
        $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        return view('futsal-admin.booking_today',compact('futsal','time', 'date','booked_time','users'));
    }
    public function bookingTomorrow()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $users = User::orderBy('name')->get();
        $date = Carbon::now()->format('Y-m-d');
        // $today->setTimezone('Asia/Kathmandu');
        $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        return view('futsal-admin.booking_tomorrow',compact('futsal','time', 'date','booked_time','users'));
    }
    public function bookingAfter()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $users = User::orderBy('name')->get();
        $date = Carbon::now()->format('Y-m-d');
        // $today->setTimezone('Asia/Kathmandu');
        $time = DB::select('SELECT * FROM times WHERE book_time NOT IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        $booked_time = DB::select('SELECT * FROM times WHERE book_time IN ( SELECT book_time from booking where isBooked = 1 AND book_date = ? AND futsal_id = ? )',[$date,$futsal->id]);
        return view('futsal-admin.booking_after',compact('futsal','time', 'date','booked_time','users'));
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

    public function cancelBooking(Request $request){
        $booking = new Booking();
        $booking->penalty = 30;
        $booking->isBooked = 0;
        if($booking->save()){
            //Redirect with Flash message
            return redirect("/my-bookings")->with('status', 'Booking cancelled Successfully!');
        }
        else{
            return redirect("/futsals/$request->futsal_id/book-today")->with('status', 'Could not cancel booking at the moment!');
        }
    }

    public function updateFutsal(Request $request){
        $futsals = Futsal::where('owner_id', Auth::user()->id)->first();
        if ($file = $request->file('image')) {
            $request->validate([
                'image' =>'mimes:jpg,jpeg,png,bmp'
            ]);
            $image = $request->file('image');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/futsals',$fullname);
            }

            else{
                $fullname = $futsals->image;
            }
            //Update


            $futsals->owner_id = $request->owner_id || 0;
            $futsals->name= $request->name;
            $futsals->email = $request->email;
            $futsals->image = $fullname;
            $futsals->contact = $request->contact;
            $futsals->date = $request->date || null;
            $futsals->city = $request->city;
            $futsals->area = $request->area;
            $futsals->map = $request->map;

            if($futsals->save()){
                return redirect('/futsal-admin/futsal')->with('status', 'Futsal updated Successfully!');
            }
            else{
                return redirect('/futsal-admin/futsal')->with('status', 'There was an error');

            }
            //
        }

    public function allBookings()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $booking_list = Booking::where('futsal_id',$futsal->id)->orderBy('id','DESC')->paginate(10);
        return view('futsal-admin.all-bookings',compact('booking_list'));
    }

    public function cancelledBookings()
    {
        $futsal = Futsal::where('owner_id', Auth::user()->id)->first();
        $booking_list = Booking::where('futsal_id',$futsal->id)->where('isBooked',0)->orderBy('id','DESC')->paginate(10);
        return view('futsal-admin.cancelled-bookings',compact('booking_list'));
    }

    public function profile($id)
    {
        return view('futsal-admin.profile');
    }
    public function addFutsal()
    {
        return view('futsal-admin.add-futsal');
    }

    public function futsalAdminBooking(Request $request){
        $request->validate([
            'book_date' => 'required',
            'futsal_id' => 'required',
            'book_time'=> 'required',
            'isBooked' => 'required'
        ]);
        $booking = new Booking();
        $booking->futsal_id = $request->futsal_id;
        $booking->booker_id = Auth::user()->id;
        $booking->out_user = $request->name;
        $booking->out_user_phone = $request->name;
        $booking->paid = false;
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
}
