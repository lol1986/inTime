@extends('layouts.private.app')
@section('content')
      <h1 class='display-3'>{{__($class.'.'.$class)}}</h1>
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ 
            __($class.'.key').
            __('actions.'.session()->get('success')) 
            }}
        </div>
      @endif
      <p><a href="{{ route($class.'.create')}}" class='btn btn-primary'>{{__('actions.add')}}<img class="ml-2" width='15px' src="/images/add.png"></a></p>
      <div class ='table-responsive col-lg-11'>
        <table class='table table-striped'>
          <thead>
            
            @for($i=0; $i<count($object[0]->getPrintable()); $i++)
            <th>{{__($class.'.'.$object[0]->getPrintable()[$i])}}</th>
            @endfor
          </thead>
          <tbody>
            @foreach($object as $item)
            @if ($item->active !="1")
              <tr class ='table-danger'>
            @else
              <tr>
            @endif
            @foreach ($object[0]->getPrintable() as $param)
                @if (substr($param, strlen($param)-3, strlen($param))=='_id')
                @php
                  $str =substr($param,0,strlen($param)-3);
                @endphp
                <td>{{$object[0]->$str->name}}</td>
                @else
                  <td>{{$item->getAttribute($param)}}</td>
                @endif
            @endforeach
              <td>
                <div class ="row justify-content-lg-end pr-4">
                  <a href="{{ route($class.'.show', $item->id)}}" class='btn btn-primary'><img width='15px' src="/images/info.png"></a>
                  <a href="{{ route($class.'.edit', $item->id)}}" class='btn btn-warning'><img width='15px' src="/images/edit.png"></a>
                  <form action="{{ route($class.'.destroy', $item->id)}}" method='post'>
                    @csrf
                    @method('DELETE')
                    <button class='btn btn-danger' type='submit'><img width='15px' src="/images/delete.png"></button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$object->links()}}
      </div>
      @endsection