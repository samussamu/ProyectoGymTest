<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
     <!-- jQUERY CDN  -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  </head>
  <body class="bg-gray-100 text-gray-800 ">
    <!-- Document body -->
    <nav class="flex py-5 bg-indigo-500 text-white  ">
        <div class="w-1/2 px-12 mr-auto">
            <a href="{{redirect()->to('/')}}" class="text-2x1 font-bold"> Gym Laravel</a>
            @if (auth()->check())
            <a href=" {{route('ejercicios.index')}}" class=" mx-4 px-4 py-3 text-white bg-green-500 rounded-md">Ejercicios</a>
            <a href=" {{route('marcas.index')}}" class="  px-4 py-3 text-white bg-green-500 rounded-md">Mis Marcas</a>     
            @endif
        </div>

        <ul class="flex w-1/2 px-16 ml-auto justify-end pt-1">
            @if (auth()->check())
                <li class="mx-8 flex  py-0 ">
                  @if(isset(auth()->user()->image->url))
                <img class="w-10 h-10 rounded-full mr-4" src="{{auth()->user()->image->url}}">
                  @endif
                  <p class="text-xl ">Welcome <b>{{auth()->user()->name}}</b></p>
               </li>
               <li>
                <a href="{{route('login.destroy')}}" class="font-bold  py-3 px-4 rounded-md bg-red-500 hover:bg-red-600 hover:text-indigo-700">Log Out</a>
                </li>
            @else
            <li class="mx-6">
                <a href="{{route('login.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md mx-6"> Log In</a>
            </li>
            <li>
             <a href="{{route('register.index')}}" class="font-semibold border 2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700"> Register</a>
             </li>
            @endif
        </ul>

    </nav>

    <main class="p-16 flex justify-center">

  
    @yield('content')
   </main>
 


  </body>
</html>