@php             
$class =strtolower (explode("\\",$object->getClassName())[1]).'s';
@endphp
@extends('layouts.private.components.newForm')
@section('buttons')
    @include('layouts.private.components.submit')
@endsection
