@php             
$class =strtolower (explode("\\",$className)[1]).'s'; 
@endphp
@extends('layouts.private.components.form')
@section('buttons')
    @include('layouts.private.components.submit')
@endsection
