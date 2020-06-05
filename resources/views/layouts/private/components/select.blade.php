@php
$paramName= substr($param, 0, strlen($param)-3);
//dd($parents[$paramName][0]->id);

@endphp
<div style="width:100%;float:left;padding-bottom:0.5em">
    <div style="width:50%;float:left;">
        <select class ="form-control" name={{$param}} id={{$param}} style="width:50%" onchange="lista(this.value)">
        <option value="0" selected="selected">todos...</option>    
            @foreach ($parents[$paramName] as $item)
                <option value="{{$item->id}}" >{{$item->name}}</option>
            @endforeach
        </select> 
    </div>
</div>               
         