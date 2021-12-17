<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Ejercicio;
class MarcasController extends Controller
{
    public function index( Marca $marca_model)
    {
        $id=auth()->user()->id;
        $arrayMarcas=$marca_model->where('user_id',$id)->orderBy('created_at','desc')->get();
        return view("marca.index",compact('arrayMarcas'));
    }

    public function create(Ejercicio $ejercicio_model){
        $arrayEjercicios=$ejercicio_model->all();
        return view("marca.create",compact('arrayEjercicios'));
    }

    public function store(Request $request){

        $this->validate(request(),[
            'rep'=>'required',
        ]);
        $user_id=auth()->user()->id;
        $marca = new Marca();
        $marca ->rep = $request -> rep;
        $marca ->user_id = $user_id;
        $marca ->ejercicio_id = $request -> ejercicio_id;
        
        $marca -> save();

        return redirect()->route('marcas.index');
    }

    public function destroy($id,Marca $marca_model){
        $marca = $marca_model->find($id);
        $marca->delete();
        return redirect()->route('marcas.index');
    }

    public function edit($id,Marca $marca_model,Ejercicio $ejercicio_model){

        $marca = $marca_model->find($id);
        $arrayEjercicios=$ejercicio_model->All();
        return view('marca.edit',compact('marca','arrayEjercicios'));
    }

    public function update( Request $request,$id,Marca $marca_model)
    { 
        $this->validate(request(),[
            'rep'=>'required',
        ]);
        $marca = $marca_model->find($id);
        $marca->rep=$request->rep;
        $marca->ejercicio_id=$request->ejercicio_id;
        $marca->update();
        return redirect()->route('marcas.index');
    }

}
