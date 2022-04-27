<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Futsal;

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
    public function futsalDetail()
    {
        return view('frontend.futsal-detail');
    }
    public function booking()
    {
        return view('frontend.booking');
    }
}
