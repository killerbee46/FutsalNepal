<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Futsal;
use Carbon\Carbon;

class FutsalController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Read

        $futsals = Futsal::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.futsals.main',compact('futsals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.futsals.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CREATE
    //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'image'=>'required',
            'contact'=>'required',
            'city'=>'required',
            'price'=>'required',
            'area'=>'required',
            'map'=>'required'
        ]);

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
            $fullname = 'image.png';
        }

        $futsals = new Futsal();
        $futsals->owner_id = $request->owner_id || 0;
        $futsals->name= $request->name;
        $futsals->email = $request->email;
        $futsals->image = $fullname;
        $futsals->contact = $request->contact;
        $futsals->date = $request->date || null;
        $futsals->price = $request->price;
        $futsals->city = $request->city;
        $futsals->area = $request->area;
        $futsals->map = $request->map;
        $futsals->save();


        if($futsals->save()){
            //Redirect with Flash message
            return redirect('/admin/futsal')->with('status', 'Futsal added Successfully!');
        }
        else{
            return redirect('/futsal/create')->with('status', 'There was an error!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Read individual
        // $posts = Post::find(3)->get();
        $futsals = Futsal::findOrFail($id);
        return view('admin.futsals.show',compact('futsals'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFutsal($id)
    {
        //Update View
        $futsals = Futsal::where('id',$id)->first();
        return view('admin.futsals.edit',compact('futsals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFutsal(Request $request, $id){
        $futsal = Futsal::where('id', $id)->first();
    if ($file = $request->file('image')) {
        $request->validate([
            'image' =>'mimes:jpg,jpeg,png,bmp'
        ]);
        $image = $request->file('image');
        $imgExt = $image->getClientOriginalExtension();
        $fullname = time().".".$imgExt;
        $result = $image->storeAs('images/futsals',$fullname);
        }
        else if ($futsal->image) {
            $fullname = $futsal->image;
        }
        else{
            $fullname = $futsal->image;
        }
        //Update
        $futsals = Futsal::find($id)->first();

        $futsals->owner_id = $futsal->owner_id;
        $futsals->name= $request->name;
        $futsals->email = $request->email;
        $futsals->image = $fullname;
        $futsals->contact = $request->contact;
        $futsals->date = $request->date || null;
        $futsals->city = $request->city;
        $futsals->area = $request->area;
        $futsals->map = $request->map;

        if($futsals->save()){
            return redirect('/admin/futsal')->with('status', 'Futsal updated Successfully!');
        }
        else{
            return redirect('admin/futsal/$id/edit')->with('status', 'There was an error');

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFutsal($id)
    {
        //Delete
        $futsals = Futsal::find($id);
        if($futsals->delete()){
            return redirect('/admin/futsal')->with('status', 'Futsal was deleted successfully');
        }
        else return redirect('/admin/futsal')->with('status', 'There was an error');


    }
    public function searchFutsalForAdmin(Request $request){

        $searched=$request->searched;
        $data= Futsal::orWhere('name','Like',"%$searched%")->orWhere('email','Like',"%$searched%")->get();
        return view('admin.futsals.searchfutsalview',compact('data','searched'));
    }
}
