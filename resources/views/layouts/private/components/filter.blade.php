    @php
    //$paramName= substr($param, 0, strlen($param)-3);
    //dd($item->getPrintable());
    $item=$object[0];
    @endphp
<div class="col-11">    
    <div class="card">
        <div class="card-header">
            {{__('actions.filter')}}
        </div>
        <div class="card-body offset-xl-2 col-xl-8">
            <div class="col-10 container-fluid">
                <form method="POST" action="{{ route($class.'.filter')}}">
                    @csrf
                    <div class="form-group">
                        @foreach ($item->getPrintable() as $param)
                            <label for="{{$param}}" class="col-md-4 col-form-label text-md-left">{{ __($class.'.'.$param) }}</label>
                            <input id={{$param}} type="text" class="form-control" name="{{$param}}" value="" autocomplete="{{$param}}" autofocus>
                        @endforeach 
                    </div>   
                    @include('layouts.private.components.submit')     
                </form>    
            </div>
        </div>  
    </div>
</div>