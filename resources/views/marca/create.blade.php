@extends('layouts.app')

@section('title','Crear Marca')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border-gray-200 rounded-lg shadow-lg">

    <h1 class="text-3xl text-center font-bold"> Add Mark </h1>

    <form class="mt-4 " method="POST" action="{{route('marcas.store')}}">
        @csrf
      
        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Rep" id="rep" name="rep" >

        @error('rep')
         <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2"> * {{$message}}</p>     
         @enderror
        
         <select class="border border-gray-200 rounded-md bg-gray-200 w-full
         text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" name="ejercicio_id" >
            @foreach($arrayEjercicios as $ejercicio)
            <option class="" value="{{$ejercicio->id}}">{{$ejercicio->name}}</option>
            @endforeach
        </select> 

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600">Send<button>
    </form>


</div>

@endsection