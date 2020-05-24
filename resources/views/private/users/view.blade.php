@extends('layouts.private.app')
@section('content')
      <h1 class='display-3'>Usuarios</h1>
      @if(session()->get('success'))
        <div class='alert alert-success'>
          {{ session()->get('success') }}
        </div>
      @endif
      @if($errors->any())
	      <div class ='alert alert-danger'>
		      <ul>
			     @foreach($errors->all() as $error)
				     <li>{{$error}}</li>
			     @endforeach
		      </ul>
        </div>
      @endif
      <p><a href="{{ route('users.create')}}" class='btn btn-primary'>Añadir</a></p>
      <table class='table table-striped'>
        <thead>
          <tr>
            <td>Empresa</td>
            <td>Dni</td>
            <td>Nombre</td>
            <td>Email</td>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $usuario)
          @if ($usuario->active !="1")
            <tr class ='table-danger'>
          @else
            <tr>
          @endif
            <td>{{$usuario->company}}</td>
            <td>{{$usuario->dni}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td><a href="{{ route('users.edit', $usuario->id)}}" class='btn btn-primary'>Editar</a></td>
            <td>
              <form action="{{ route('users.destroy', $usuario->id)}}" method='post'>
                @csrf
                @method('DELETE')
                <button class='btn btn-danger' type='submit'>Desactivar</button>
              </form>
            </td>
            <td>
              <form action="{{ route('users.update', $usuario->id)}}" method='post'>
                @csrf
                @method('PATCH')
                <input id="active" name="active" type="hidden" value="1">
                <input id="action" name="action" type="hidden" value="activate">
                <button class='btn btn-danger' type='submit'>Reactivar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection