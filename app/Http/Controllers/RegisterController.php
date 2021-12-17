<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\NewUserHasRegisteredEvent;
class RegisterController extends Controller
{
    //

    public function create(){

        return view('auth.register');
    }

    public function store(){

        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email', 
            'password'=>'required|confirmed',
        ]);

        $user = User::create(request(['name','email','password']));
        auth()->login($user);
        event(new NewUserHasRegisteredEvent($user));
        return redirect()->to('/');

    }
}
