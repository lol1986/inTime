 <div class ="table-responsive">   
    <table class='table table-striped table-bordered'>
        <thead>
        @for($i=0; $i<count($object[0]->getPrintable()); $i++)
            <th>{{__($class.'.'.$object[0]->getPrintable()[$i])}}</th>
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
            <div class ="justify-content-end">
                <div class= "ml-2 mr-2 row">
                    <a href="{{ route($class.'.show', $item->id)}}" class='btn btn-primary'><img width='14px' src="/images/info.png"></a>
                    <a href="{{ route($class.'.edit', $item->id)}}" class='btn btn-warning'><img width='14px' src="/images/edit.png"></a>
                    <form action="{{ route($class.'.destroy', $item->id)}}" method='post'>
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-danger' type='submit'><img width='14px' src="/images/delete.png"></button>
                </form>
                <div>
            </div>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    {{$object->links()}}