@php
   // dd($object);
 //  dd($object);
    $object=json_decode($object,true);
 //   dd($object);
    $object= $object[0];
  //  $keys =array_keys($object);
    $object2= (array) json_decode($object2,true);
  //  $keys2 =array_keys($object2[0]);

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

    $timeregistry = [];
    foreach($object2 as $registry){
        $registry = (array) $registry;
        //dd(array_keys($registry));
        //dd(array_key_exists('status',$registry));
        if(array_key_exists('status',$registry)){
            $temp['status']=$registry['status'];
            $timeregistry[]=$temp;
        }
    }

    $companyKeys =array_keys($company);
    $userKeys =array_keys($user);

@endphp
@include('partials.private.header')
<body>
<h4>{{__('companies.key')}}</h4>
<table class="table table-bordered" width="100%">
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
<table class="table table-bordered" width="100%">
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

<h4>{{__('timeregistries.key')}}</h4>
<table class="table table-bordered" width="100%">
    @php
        foreach($object2 as $item){
            echo '<tr>';
            $item = (array) $item;
            foreach($item as $param)
            {
                $param = (array) $param;
                foreach($param as $object){
                   $object= json_decode($object);
                   //print_r( $mec);
                   $object = (array)$object;
                   foreach($object as $registry){
                        $registry = (array) $registry;
                    foreach ($registry as $key => $object) {
                        print_r ($object);
                    }
                   }                   
                }
            }
            echo '</tr>';
        }
    @endphp
</table>
</body>