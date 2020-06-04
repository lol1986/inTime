@extends('layouts.private.app')
@php
dd($object)  
@endphp
@section('content')
<div class="alert alert-danger" role="alert">
    <strong>No tiene permisos para realizar la acción.</strong>
  </div>
@endsection