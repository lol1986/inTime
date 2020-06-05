@php
$paramName= substr($param, 0, strlen($param)-3);
@endphp
<div>
    <div>
        <select class ="form-control" name={{$param}} id={{$param}} style="width:auto" onchange="lista(this.value)">
        <option value="0" selected="selected">todos...</option>    
            @foreach ($parents[$paramName] as $item)
                <option value="{{$item->id}}" >{{$item->name}}</option>
            @endforeach
        </select> 
    </div>
</div>               
         