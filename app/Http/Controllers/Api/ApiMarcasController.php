<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ApiMarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Marca $marca_model)
    {
        $marcas= $marca_model->all();
        $marcas->load('user');
        $marcas->load('ejercicio');
        return  response()->json($marcas,200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rep'=>'required',
        ]);
        $user_id=auth()->user()->id;

        $marca = Marca::create([
            'rep'=> $request->input('rep'),
            'user_id'=> $request->input('user_id'),
            'ejercicio_id'=>$request->input('ejercicio_id')
        ]);

        return response()->json($marca,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
       $marca->load('user');
       $marca->load('ejercicio');
        return response()->json($marca->toArray(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->rep = $request->input('rep');
        $marca->ejercicio_id = $request->input('ejercicio_id');
        $marca->save();
        return response()->json($marca,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return response()->json($marca,204);
    }
}
