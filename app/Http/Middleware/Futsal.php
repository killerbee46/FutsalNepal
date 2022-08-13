<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Futsal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $futsal = DB::select('SELECT * FROM futsal WHERE owner_id = ? ',[auth()->user()->id]);
        // $requestPending = DB::select('SELECT * FROM futsal WHERE (owner_id = ? AND status = "pending")',[auth()->user()->id]);
        $futsalCount = count($futsal);
        // dd($futsal);
        if (auth()->check() && auth()->user()->isFutsal() && $futsalCount !== 0) {

        	return $next($request);
        }
        // else if (auth()->check() && auth()->user()->isFutsal() && $requestPending ) {

        // 	return redirect('/show-request');
        // }
        else if(auth()->check() && auth()->user()->isFutsal() && $futsalCount === 0){
            return redirect('/add-futsal');
        }
        else{
            return redirect('/');
        }

    }
}
