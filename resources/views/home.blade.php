@extends('layouts.private.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Registro jornada</div>
                <div class="card-body offset-xl-2 col-xl-8 p-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->get('success'))
                    <div class='alert alert-success'>
                      {{ 
                        __('timeregistries.key').
                        __('actions.'.session()->get('success')) 
                        }}
                    </div>
                  @endif
                    <div class="d-flex flex-column">
                    
                    <div class="p-2">
                    <form method="POST" action="{{ route('timeregistries.store')}}">
                        @csrf
                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="date" value="{{now()}}">
                        <input type="hidden" name="type" value="in">
                        <input type="hidden" name="name" value="home">
                          <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('timeregistries.start') }}
                                    </button>
                        </div>
                    </form>
                     </div>
                     <div class="p-2">
                    <form method="POST" action="{{ route('timeregistries.store')}}">
                        @csrf
                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="date" value="{{now()}}">
                        <input type="hidden" name="type" value="pin">
                        <input type="hidden" name="name" value="home">
                          <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('timeregistries.pause_start') }}
                                    </button>
                        </div>
                    </form>
                    </div>
                    <div class="p-2">
                    <form method="POST" action="{{ route('timeregistries.store')}}">
                        @csrf
                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="date" value="{{now()}}">
                        <input type="hidden" name="type" value="pout">
                        <input type="hidden" name="name" value="home">
                          <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('timeregistries.pause_end') }}
                                    </button>
                        </div>
                    </form>
                    </div>
                    <div class="p-2">
                    <form method="POST" action="{{ route('timeregistries.store')}}">
                        @csrf
                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="date" value="{{now()}}">
                        <input type="hidden" name="type" value="out">
                        <input type="hidden" name="name" value="home">
                          <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('timeregistries.end') }}
                                    </button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
