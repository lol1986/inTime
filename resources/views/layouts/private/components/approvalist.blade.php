
@php
 $id='';   
@endphp
<div class ="col-11">
    @include('layouts.private.components.isError')
    @include('layouts.private.components.isSuccess')
    <div class = "d-flex text-right mr-3">
        <a href="{{ route($class.'.create')}}" class='btn btn-primary'>{{__('actions.add')}}<img class="ml-2" width='15px' src="/images/add.png"></a> 
        <form action="{{ route($class.'.approve', $id)}}" method='post'>
            @csrf
            <button href="{{ route($class.'.approve')}}" class='btn btn-warning'>{{__('actions.approve')}}</button>
            <input type="hidden" id="id" name="id" value="">
        </form> 
        <form action="{{ route($class.'.deny', $id)}}" method='post'>
            @csrf
            <button href="{{ route($class.'.deny')}}" class='btn btn-danger'>{{__('actions.deny')}}</button>
            <input type="hidden" id="id" name="id" value="">
        </form>       
    </div>
    @include('layouts.private.components.table')
</div>
<script>
$(document).ready(function(){
    $('#table').on('click', 'tr', function(event) {
      $(this).addClass('table-warning').siblings().removeClass('table-warning');
      var value = $(".table-warning td:first-child").text();
      $("#id").val(value);
    });
});    
</script>
        