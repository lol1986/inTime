
@if(session()->get('error'))
    <div class='alert alert-danger'>
        {{ 
            __($class.'.key').
            __('actions.'.session()->get('error')) 
        }}
    </div>
@endif    