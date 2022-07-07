<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\Time;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::all();
       return view('frontend.index',compact('futsal','today'));
    }
    public function futsals()
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::all();
       return view('frontend.futsals',compact('futsal','today'));
    }
    public function futsalDetail($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $futsal = Futsal::where('id', $id)->first();
        return view('frontend.futsal-detail',compact('futsal','today'));
    }
}
