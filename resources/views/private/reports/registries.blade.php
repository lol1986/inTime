@php
    $object2= (array) json_decode($object2,true);

echo '<table class="table table-bordered" width="90%">';
    echo '<tr><th>'.__('timeregistries.key').'</th></tr>';
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
                       echo '<tr>';
                        $registry = (array) $registry;
                    foreach ($registry as $key => $object) {
                        echo '<td>';
                        echo ($object);
                        echo '</td>';
                    }
                        echo '</tr>';
                   }                   
                }
            }
            echo '</tr>';
        }
echo '</table>';
@endphp