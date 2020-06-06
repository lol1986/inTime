@php
    $object=json_decode($object,true);
    $object= $object[0];

    $company['name'] = $object['companies_name'];
    $company['cif'] = $object['cif'];
    $company['address'] = $object['companies_address'];
    $company['holidays'] = $object['companies_holidays'];
    $company['calendar'] = $object['calendars_name'];

    $user['dni'] = $object['dni'];
    $user['name'] = $object['users_name'];
    $user['holidays'] = $object['users_holidays'];
    $user['pending'] = $object['pending'];
    $user['name'] = $object['users_name'];

    $companyKeys =array_keys($company);
    $userKeys =array_keys($user);

@endphp

<h4>{{__('companies.key')}}</h4>
<table class="table table-bordered" width="90%">
    <tr>
    @foreach ($companyKeys as $param)
        @if (substr($param, strlen($param)-3, strlen($param))=='_id')
        @elseif($param=='id')
        @else
            <th>{{__('companies.'.$param)}}</th>
        @endif
    @endforeach
    </tr>    
    <tr>
    @foreach ($companyKeys as $param)
        @if (substr($param, strlen($param)-3, strlen($param))=='_id')
            @elseif($param=='id')
            @else
                <td>{{$company[$param]}}</td>
            @endif
    @endforeach
    </tr>
</table>

<h4>{{__('users.key')}}</h4>
<table class="table table-bordered" width="90%">
    <tr>
    @foreach ($userKeys as $param)
        @if (substr($param, strlen($param)-3, strlen($param))=='_id')
        @elseif($param=='id')
        @else
            <th>{{__('users.'.$param)}}</th>
        @endif
    @endforeach
    </tr>    
    <tr>
    @foreach ($userKeys as $param)
        @if (substr($param, strlen($param)-3, strlen($param))=='_id')
            @elseif($param=='id')
            @else
                <td>{{$user[$param]}}</td>
            @endif
    @endforeach
    </tr>
</table>