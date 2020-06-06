
@if(session()->get('error'))
    <div class='alert alert-danger'>
        {{ 
            __('actions.'.session()->get('error')) 
        }}
    </div>
@endif    