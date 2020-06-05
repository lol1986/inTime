    @php
    //$paramName= substr($param, 0, strlen($param)-3);
    //dd($item->getPrintable());
 //   $item=$object[0];
    //dd($emptyobject);
   // dd($item);
    @endphp
<div class="col-11">    
    <div class="card">
        <div class="card-header">
            <button>{{__('actions.filter')}}</button>
        </div>
        <div class="card-body offset-xl-2 col-xl-8" style="display: none;">
            <div class="col-10 container-fluid">
                <form method="POST" action="{{ route($class.'.filter')}}">
                    @csrf
                    <div class="form-group">
                        @foreach ($emptyobject->getPrintable() as $param)
                            <label for="{{$param}}" class="col-md-4 col-form-label text-md-left">{{ __($class.'.'.$param) }}</label>
                            <input id={{$param}} type="text" class="form-control" name="{{$param}}" value="" autocomplete="{{$param}}" autofocus>
                        @endforeach 
                    </div>   
                    <div class="form-group row mb-0  text-right mr-3">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-primary">
                                {{ __('actions.filter') }}
                            </button>
                            <button type="submit" class="btn btn-warning">
                                {{ __('actions.reset') }}
                            </button>
                         </div>
                    </div>
                </form>    
            </div>
        </div>  
    </div>
</div>

<script>
    $(document).ready(function(){
      $("button").click(function(){
        $(".card-body").toggle();
      });
    });
</script>