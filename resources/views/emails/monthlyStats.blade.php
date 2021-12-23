<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
</head>
<body>
    <h1>Hi {{$user->name}}! GymStats Monthly review! </h1>

    @if (count($user->marcas) >= 1)

    @foreach ($user->marcas as $marca)
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
             
            </tr>
          </thead>

          <tbody>
              @foreach ( $user->marcas as $marca)
            <tr>
              <td class="py-3 px-6">{{$marca->id}}</td>
              <td class="p-3">{{$marca->ejercicio->name}}</td>
              <td class="p-3">{{$marca->ejercicio->muscle}}</td>
              <td class="p-3">{{$marca->rep}}</td>
              <td class="p-3 text-center">{{$marca->created_at}}</td>
              <td class="p-3 text-center">{{$marca->updated_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    @endforeach
    @else
    <p>Dont have marks</p>
    @endif
    <p> tesat email send with laravel</p>
</body>
</html>