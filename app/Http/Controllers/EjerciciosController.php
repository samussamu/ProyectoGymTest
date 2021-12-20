<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;
use App\Models\User;
class EjerciciosController extends Controller
{
    //
    public function index(Ejercicio $ejercicio_model)
    {
        $arrayEjercicios = $ejercicio_model->all();
        return view("ejercicio.index",compact('arrayEjercicios'));
    }

    public function create()
    {
        return view("ejercicio.create");
    }

    public function store( Request $request)
    { 
        $this->validate(request(),[
            'name'=>'required',
            'muscle'=>'required',
        ]);
        $ejercicio = new Ejercicio();
        $ejercicio ->name = $request -> name;
        $ejercicio ->muscle = $request -> muscle;
        $ejercicio -> save();

        return redirect()->route('ejercicios.index')->with('message','Exercice '.$ejercicio->name.' has been added');;
    }
    
    public function destroy($id,Ejercicio $ejercicio_model){
        $ejercicio = $ejercicio_model->find($id);
        $ejercicio->delete();
        return redirect()->route('ejercicios.index');
    }

    public function edit($id,Ejercicio $ejercicio_model){

        $ejercicio = $ejercicio_model->find($id);
        return view('ejercicio.edit',compact('ejercicio'));
    }

    public function update( Request $request,$id,Ejercicio $ejercicio_model)
    { 
        $this->validate(request(),[
            'name'=>'required',
            'muscle'=>'required',
        ]);
        $ejercicio = $ejercicio_model->find($id);
        $ejercicio->name=$request->name;
        $ejercicio->muscle=$request->muscle;
        $ejercicio->update();
        return redirect()->route('ejercicios.index');
    }
}
