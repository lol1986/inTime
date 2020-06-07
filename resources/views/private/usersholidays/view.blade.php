@extends('layouts.private.app')
@section('content')
<div>
    @include('layouts.private.components.header')       
    @include('layouts.private.components.filter')
    @include('layouts.private.components.approvalist') 
</div>
@endsection

<script>
    $('#table').on('click', 'tr', function(event) {
      $(this).addClass('table-warning').siblings().removeClass('table-warning');
    });
</script>
        