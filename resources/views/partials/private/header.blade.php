<head>
  <title>inTime Registro horario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--<link href="{{ asset('js/app.js') }}" rel="stylesheet">-->
</head>
<div class="text-center">
  <div class="container d-flex justify-content-around align-items-center">
    <div class="d-flex">
      <div class="p-2">
        <div class="">
          <div>
            <img class="bt-logo" src="{{URL::asset('/images/logo120.png')}}">
            <h5>InTime ®</h5>
          </div>
        </div>   
      </div>
    </div> 
      <div class="d-flex">
        <div class="p-2">
          <h1>InTime -Software de registro horario </h1>
        </div>
      </div>
    </div>
</div>
