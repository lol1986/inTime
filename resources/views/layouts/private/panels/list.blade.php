@extends('layouts.private.app')
@section('content')
      <h1 class='display-3'>{{__($class.'.'.$class)}}</h1>
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ session()->get('success') }}
        </div>
      @endif
      <p><a href="{{ route($class.'.create')}}" class='btn btn-primary'>{{__('actions.add')}}<img class="ml-2" width='15px' src="/images/add.png"></a></p>
      <div class ='table-responsive'>
        <table class='table table-striped'>
          <thead>
            
            @for($i=0; $i<count($objeto[0]->getPrintable()); $i++)
            <td>{{__($class.'.'.$objeto[0]->getPrintable()[$i])}}</td>
            @endfor
          </thead>
          <tbody>
            @foreach($objeto as $item)
            @if ($item->active !="1")
              <tr class ='table-danger'>
            @else
              <tr>
            @endif
              @for($i=0; $i<count($objeto[0]->getPrintable()); $i++)
              <td>{{$item->getAttribute($objeto[0]->getPrintable()[$i])}}</td>
              @endfor
              <td>
                <div class ="row justify-content-md-end pr-4">
                  <a href="{{ route($class.'.edit', $item->id)}}" class='btn btn-primary'><img width='15px' src="/images/info.png"></a>
                  <form action="{{ route($class.'.destroy', $item->id)}}" method='post'>
                    @csrf
                    @method('DELETE')
                    <button class='btn btn-warning' type='submit'><img width='15px' src="/images/edit.png"></button>
                  </form>
                  <form action="{{ route($class.'.update', $item->id)}}" method='post'>
                    @csrf
                    @method('PATCH')
                    <input id="active" name="active" type="hidden" value="1">
                    <input id="action" name="action" type="hidden" value="deactivate">
                    <button class='btn btn-danger' type='submit'><img width='15px' src="/images/delete.png"></button>
                </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endsection