@extends('layouts.private.app')
@section('content')
      <h1 class='display-3'>{{__($class.'.'.$class)}}</h1>
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ session()->get('success') }}
        </div>
      @endif
      <p><a href="{{ route($class.'.create')}}" class='btn btn-primary'>{{__('actions.add')}}</a></p>
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
              <td><a href="{{ route($class.'.edit', $item->id)}}" class='btn btn-primary'>{{__('actions.edit')}}</a></td>
              <td>
                <form action="{{ route($class.'.destroy', $item->id)}}" method='post'>
                  @csrf
                  @method('DELETE')
                  <button class='btn btn-danger' type='submit'>{{__('actions.deactivate')}}</button>
                </form>
              </td>
              <td>
                <form action="{{ route($class.'.update', $item->id)}}" method='post'>
                  @csrf
                  @method('PATCH')
                  <input id="active" name="active" type="hidden" value="1">
                  <input id="action" name="action" type="hidden" value="activate">
                  <button class='btn btn-danger' type='submit'>{{__('actions.activate')}}</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endsection