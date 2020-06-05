@php
//dd($emptyobject->getPrintable());
@endphp 
 
 <div class ="table-responsive p-1">   
    <table class='table table-striped table-bordered'>
        <thead>
        @for($i=0; $i<count($emptyobject->getPrintable()); $i++)
            <th>{{__($class.'.'.$emptyobject->getPrintable()[$i])}}</th>
        @endfor
        <th></th>
        </thead>
        <tbody>
        @if($object->getCollection()->count()=='0')
        <tr class='alert alert-danger'>
                <td colspan={{count($emptyobject->getPrintable())+1}}>
                    {{ 
                        __('actions.not_exists').
                        __($class.'.'.$class)
                    }}
                </td>
            </tr>  
         @else
         
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
                <div class ="row justify-content-end">
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
         @endif    
    </table>
</div>
    {{$object->links()}}