<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;







class UserController extends Controller
{
    public function register(Request $request){
    $data = $request->validate([
    'name' =>'required',
    'email' =>'required|email',
    'password' =>'required|confirmed',
]);

  $user = user::create($data);

  if($user){
    return redirect()-> route('login');
  }
    }

    // public function login(Request $request){
    // $credentials = $request->validate([
    // 'email' =>'required|email',
    // 'password' =>'required',
    //    ]);
       
    //    if(Auth::attempt($credentials)){
    //     return redirect()->route('index');
    //    }
    // }

    public function login(Request $request)
       {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->route('index');
    } else {
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }
}
    
    public function indexPage(){
      if(Auth::check()){
        return view('index');     
    }else{
      return redirect()->route('login');
    }
    }
}
    
