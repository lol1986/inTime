 <div class="row justify-content-center">
        <div class="col-md-12">
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ session()->get('success') }}
        </div>
      @endif
      <form method="POST" action="{{ route($class.'.store')}}">
        @csrf
        @php
          $className = $object->getClassName();
          $classObject = new $className;
          $params=$classObject->getFillable();
        @endphp
        @foreach($params as $param)
          <div class="form-group row">
            <label for="{{$param}}" class="col-md-4 col-form-label text-md-right">{{ __($class.'.'.$param) }}</label>
            <div class="col-md-6">
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