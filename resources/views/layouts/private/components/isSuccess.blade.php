
    @if(session()->get('success'))
        <div class='alert alert-success'>
            {{ 
                __($class.'.key').
                __('actions.'.session()->get('success')) 
            }}
        </div>
    @endif    

