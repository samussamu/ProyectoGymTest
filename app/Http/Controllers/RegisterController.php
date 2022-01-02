<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\NewUserHasRegisteredEvent;
use App\Events\SendStatsEvent;
class RegisterController extends Controller
{
 
    public function create(){

        return view('auth.register');
    }

    public function store(){

        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email', 
            'password'=>'required|confirmed',
        ]);

        $user = User::create(request(['name','email','password']));
        
       event(new NewUserHasRegisteredEvent($user));
        auth()->login($user);
       
       return redirect()->to('/');

    }
}
