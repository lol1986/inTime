@extends('layouts.private.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 class='display-3'>{{__($class.'.'.$class)}}</h1>
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ session()->get('success') }}
        </div>
      @endif
      <form method="POST" action="{{ route($class.'.update', $object->id)}}">
        @method('PATCH')
        @csrf
        @php
          $className = $object->getClassName();
          $classObject = new $className;
          $params=$classObject::getPrintable();
        @endphp
        @foreach($params as $param)
          <div class="form-group row">
            <label for="{{$param}}" class="col-md-4 col-form-label text-md-right">{{ __($class.'.'.$param) }}</label>
            <div class="col-md-6">
              <input id={{$param}} @if ($readable[$param] ?? ''=='false') readonly="readonly" @endif type="text" class="form-control @error($param) is-invalid @enderror" name="{{$param}}" value="{{ $object->$param }}" required autocomplete="{{$param}}" autofocus>
                @error($param)
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>
        @endforeach
        @yield('buttons')
      </form>          
   </div>
@endsection