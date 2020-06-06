<div class ="table-responsive p-1">   
    <table class='table table-striped table-bordered'>
        <thead>
            @for($i=0; $i<count($emptyobject->getPrintable()); $i++)
                <th>{{__($class.'.'.$emptyobject->getPrintable()[$i])}}</th>
            @endfor
            <th></th>
        </thead>
        <tbody>
            @foreach($object as $item)
                @if ($item->active !="1")
                <tr class ='table-danger'>
                @else
                <tr>
                @endif
                @foreach ($item->getPrintable() as $param)
                @if (substr($param, strlen($param)-3, strlen($param))=='_id')
                    @php
                    $str =substr($param,0,strlen($param)-3);
                    @endphp
                    <td>{{$item->$str->name}}</td>
                @else
                    <td>{{$item->getAttribute($param)}}</td>
                @endif
                @endforeach
                <td>
              </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>