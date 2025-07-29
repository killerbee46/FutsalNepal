<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role'=>'required| int',
            'profile_pic'=>'string',
            'lat'=>'',
            'lang'=>'',

        ]);
        if ($file = $request->hasFile('profile_pic')) {

            $request->validate([
                'profile_pic' =>'mimes:jpg,png,bmp,webp',
            ]);
            $image = $request->file('profile_pic');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/users',$fullname);

    }
    else{
        $fullname = "default.png";
    }

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile'=>$request->mobile,
            'role'=>$request->role,
            'profile_pic'=>$fullname
        ]));
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
