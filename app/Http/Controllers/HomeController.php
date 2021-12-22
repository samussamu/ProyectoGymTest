<?php
/* Not in use atleat for now*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index( User $user)
    {
        $usuario=$user->find(auth()->user()->id);
        return view("home",compact('usuario'));
    }
}
