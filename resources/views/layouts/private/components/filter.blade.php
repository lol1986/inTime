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

<script type="text/javascript">
/* 
Para hacer la llamada en Ajax hay que serializar a JSON el objeto 
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){
        e.preventDefault();
        var name = $("input[name=id]").val();
        var password = $("input[name=name]").val();
        var email = $("input[name=email]").val();

        $.ajax({
           type:'POST',
           url:'/users/filter',
           data:{id:id, name:name, email:email},
           success:function(data){
              alert(data.success);
           }
        });
	});*/

</script>