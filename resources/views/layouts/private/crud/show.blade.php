@php      
$class =strtolower (explode("\\",$object->getClassName())[1]).'s';
@endphp
@include('layouts.private.components.form')