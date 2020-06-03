
    @if($object->getCollection()->count()=='0')
        <div class='alert alert-danger'>
            {{ 
                __('actions.not_exists').
                __($class.'.'.$class)
            }}
        </div>  
    @else
        @include('layouts.private.components.table')
    @endif    

