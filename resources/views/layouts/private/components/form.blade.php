<div class="row">
  <div class="col-md-10 offset-2">
    <form method="POST" action="{{ route($class.'.update', $object->id)}}">
      @method('PATCH')
      @csrf
      @php
        $className = $object->getClassName();
        $classObject = new $className;
        $item=$classObject::getPrintable();
      @endphp
      @foreach($item as $param)
        <label for="{{$param}}" class="col-md-4 col-form-label text-md-left">{{ __($class.'.'.$param) }}</label>
          <div class="col-md-6">
            <div class="form-group row"> 
              @if(substr($param, strlen($param)-3, strlen($param))=='_id')
                @php
                  $str =substr($param,0,strlen($param)-3);
                @endphp
                <input id={{$object->$str->name}} readonly="readonly" type="text" class="form-control" name="{{$object->$str->name}}" value="{{ $object->$str->name }}" required autocomplete="{{$param}}" autofocus>
                <input id={{$param}} readonly="readonly" type="hidden" class="form-control" name="{{$param}}" value="{{ $object->$param }}" required autocomplete="{{$param}}" autofocus>
              @elseif($param=='id')
                <input id={{$param}} readonly="readonly" type="text" class="form-control" name="{{$param}}" value="{{ $object->$param }}" required autocomplete="{{$param}}" autofocus>
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
      <input id="action" name="action" type="hidden" value="update">
      @include('layouts.private.components.submit')
    </form>          
  </div>
</div>