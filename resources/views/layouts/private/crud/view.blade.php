@php     
$class =strtolower (explode("\\",$object[0]->getClassName())[1]).'s'; 
@endphp
@include('layouts.private.components.list')
