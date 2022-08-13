<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FutsalAdminController extends Controller
{

    public function index()
    {
        return view('futsal-admin.index');
    }

    public function futsal(){
        return view('futsal-admin.futsal');
    }
    public function booking()
    {
        return view('futsal-admin.booking_today');
    }
    public function bookingTomorrow()
    {
        return view('futsal-admin.booking_tomorrow');
    }
    public function bookingAfter()
    {
        return view('futsal-admin.booking_after');
    }
    public function allBookings()
    {
        return view('futsal-admin.all-bookings');
    }

    public function cancelledBookings()
    {
        return view('futsal-admin.cancelled-bookings');
    }

    public function profile($id)
    {
        return view('futsal-admin.profile');
    }
    public function addFutsal()
    {
        return view('futsal-admin.add-futsal');
    }
}
