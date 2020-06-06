<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;

class ReportController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->className = get_class(new Holiday());
     //   $this->regular = true;
      //  $this->middleware('auth');
      //  $this->middleware('superadmin');
    }
    
    public function download(Request $request)
    {
      /*  $currentClass = 'App\User';
        $object = new User;
        $emptyobject = new User;
        $object = new $currentClass;

        $data = [
            'titulo' => $currentClass::getAlias().'.net',
            'action' => __FUNCTION__,
            'class' => $currentClass::getAlias(),
            'emptyobject' => $emptyobject,
            'object' => $object->paginate(),

            //'titulo' => $currentClass::getAlias().'.net'
        ];*/
        //dd($request['data']);
        //$body= $request->all()['data'];
        $data = [
            'titulo' => 'MEEEEEEEEEEEEEEEEEC',

            //'titulo' => $currentClass::getAlias().'.net'
        ];
        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('holi pdf xD');
        //$dompdf->load_html($html);
        return $pdf->stream();
        //$pdf = \PDF::load('private.components.table', $data);
        //return $pdf->download($currentClass::getAlias().'.pdf');
    }

}
