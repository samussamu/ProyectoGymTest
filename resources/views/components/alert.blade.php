
    <div class="bg-{{$color}}-100 border border-{{$color}}-400 text-{{$color}}-700 px-4 py-3 mb-5 rounded relative" role="alert" id="alertMessage">
        <strong class="font-bold">Hey Sir!</strong>
        <span class="block sm:inline">{{$slot1}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-2" >
    
          <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"id="closeAlert">X</button>
    
        </span>
      </div>
      <script>
        $(document).ready(function () {
          $("#closeAlert").click(function(){
        $("#alertMessage").toggle();})});
        </script>