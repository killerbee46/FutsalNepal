<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Futsal;
use App\Models\Booking;
use App\Models\User;
use App\Models\Time;
use App\Models\Comment;
use App\Models\Notification;
use Carbon\Carbon;
use Auth;

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
        $comments = Comment::where('futsal_id',$id)->with('user')->orderby('created_at', 'desc')->get();
        $total_rating = 0;
        foreach ($comments as $comment) {
            // $int
            $total_rating = $total_rating + (int)$comment->rating;
        }
        $avg_rat = $total_rating / count($comments);
        $avg_rating = sprintf("%.2f", $avg_rat);
        $myComment = 0;
        if (auth()->check()) {
            $myComment = Comment::where('futsal_id',$id)->where('user_id',auth()->user()->id)->count();
        }
        return view('frontend.futsal.futsal-detail',compact('futsal','today','comments','myComment','avg_rating'));
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

    public function comment(Request $request ,$id)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->rating = $request->star;
        $comment->futsal_id = $id;
        $comment->user_id = Auth::user()->id;
        $futsal = Futsal::where('id', $id)->first();
        if($comment->save()){
            $comments = Comment::where('futsal_id',$id)->with('user')->orderby('created_at', 'desc')->get();

            return redirect('/futsals/'.$id);
        }

    }
    public function deletecomment(Request $request ,$id)
    {
        $comment = Comment::findOrFail($id);
        $futsal_id = $comment->futsal_id;
        if($comment->delete()){
            return redirect('/futsals/'.$futsal_id)->with('status', 'Comment deleted successfully');
        }
        else return redirect('/futsals/'.$futsal_id)->with('status', 'There was an error');
    }

    public function openNotification($id)
    {

        $notification = Notification::findorfail($id);

        $notification->isOpened = true;
$notification->save();
// dd(is_string(Carbon::create($notification->updated_at)->diffForHumans()));

Notification::where('id',$id)->where('isOpened',true)->where('updated_at','<',Carbon::now()->subMinute(1))->delete();


if ($notification->save()) {
    return redirect('/')->with('success',"Notification opened successfully");
}

    }

}
