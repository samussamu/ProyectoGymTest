<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user_model)
    {
      
        $users= $user_model->all();

        return  response()->json($users,200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        
        return [
            'mesage'=>'tokens removed, loged out'
        ];
    }
    public function Register(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed'
        ]);
        /*
        $user= new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password=bcrypt($request->input('password'));
        //$user->remember_token=Str::random(10); */
        $user = User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;

        

        $response= [
            'user'=>$user,
            'token'=>$token
        ];
       
        return response()->json($response,201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
      
        //is this dangerous ? for sql injection ? how should i do it properly
        $user = User::where('email',$request->input('email'))->first();

        if( !$user || !Hash::check($request->input('password'),$user->password)) {
            return response([
                'message' => 'bad creds'
            ], 401);
        };
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response= [
            'user'=>$user,
            'token'=>$token
        ];
       
        return response()->json($response,201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      
        $user->load('image');
        return response()->json($user->toArray(), 200);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /*
        $user = User::find($user->id);
        $user->update($request->all())
        */
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         $user->delete();
        return response()->json($user,204);
    }
     /**
     * Search by email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search( Request $request)
    {
        $user=User::where('email', 'like','%'.$request->input('email').'%')->get();
       return response()->json($user, 200);
     }
}
