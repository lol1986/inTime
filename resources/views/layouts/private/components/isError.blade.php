
@if(session()->get('error'))
    <div class='alert alert-danger'>
        @if(session()->get('error')!='unauthorized')
        {{ __($class.'.key') }}    
        @else
        {{ 
            __('actions.'.session()->get('error')) 
        }}
        @endif
    </div>
@endif    