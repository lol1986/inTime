 <div class="row">
    <div class="col-md-10 offset-2">
      <form method="POST" action="{{ route($class.'.store')}}">
        @csrf
        @php
          $className = $object->getClassName();
          $classObject = new $className;
          $params=$classObject->getFillable();
        @endphp
        @foreach($params as $param)
        <div class="col-md-6">
          <div class="form-group row">
            <label for="{{$param}}" class="col-md-4 col-form-label text-md-left">{{ __($class.'.'.$param) }}</label>
              @if(substr($param, strlen($param)-3, strlen($param))=='_id')
                @include('layouts.private.components.select')
              @else
                <input id={{$param}} @if ($readable[$param] ?? ''=='false') readonly="readonly" @endif type="text" class="form-control @error($param) is-invalid @enderror" name="{{$param}}" value="{{ $object->$param }}" required autocomplete="{{$param}}" autofocus>
              @endif  
                @error($param)
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>
        @endforeach
        @include('layouts.private.components.submit')
      </form>          
   </div>
  </div>