
    <h4>{{__($class.'.key')}}</h4>
    <table class="table table-bordered">
        <tr>
        @foreach ($keys as $param)
            @if (substr($param, strlen($param)-3, strlen($param))=='_id')
            @elseif($param=='id')
            @else
                <th>{{$param}}</th>
            @endif
        @endforeach
        </tr>    
        <tr>
        @foreach ($keys as $param)
            @if (substr($param, strlen($param)-3, strlen($param))=='_id')
                @elseif($param=='id')
                @else
                    <td>{{$object[$param]}}</td>
                @endif
        @endforeach
        </tr>
    </table>
