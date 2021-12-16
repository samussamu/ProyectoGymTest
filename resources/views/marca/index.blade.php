@extends('layouts.app')

@section('title','Marcas')

@section('content')


<div class=" mx-auto sm:px-6 lg:px-8">

    <div class="mb-5" >
        <a href=" {{route('marcas.create')}}" class="mx-5 px-4 py-3 text-white bg-green-500 rounded-md">Añadir Marca</a>
    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <table class="table w-full">
          <thead>
            <tr class="bg-indigo-500 text-white">
              <th class="w-20 py-4 ...">ID</th>
              <th class="w-1/8 py-4 ...">Ejercice</th>
              <th class="w-1/16 py-4 ...">Muscle</th>  
              <th class="w-1/16 py-4 ...">Reps</th>
              <th class="w-1/16 py-4 ...">Created</th>
              <th class="w-1/16 py-4 ...">Updated</th>
              <th class="w-28 py-4 ...">Actions</th>
            </tr>
          </thead>

          <tbody>
              @foreach ( $arrayMarcas as $marca)
            <tr>
              <td class="py-3 px-6">{{$marca->id}}</td>
              <td class="p-3">{{$marca->ejercicio->name}}</td>
              <td class="p-3">{{$marca->ejercicio->muscle}}</td>
              <td class="p-3">{{$marca->rep}}</td>
              <td class="p-3 text-center">{{$marca->created_at}}</td>
              <td class="p-3 text-center">{{$marca->updated_at}}</td>
              <td class="p-3 flex justify-center">
                  <form action="{{ route('marcas.destroy', $marca->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="bg-red-500 text-white px-3 py-1 mx-2 rounded-sm">
                    <i class="fas fa-trash"></i></button>
                  </form>
                    <a href="{{route('marcas.edit',$marca->id)}}" class="bg-green-500 text-white px-3 py-1 mx-2 rounded-sm">
                    <i class="fas fa-pen"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

@endsection