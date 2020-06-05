<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usersholiday;

class UsersholidayController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Usersholiday());
        $this->regular = true;
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
        $this->middleware('admin', ['only' => 'show']);
        //$this->middleware('superadmin', ['only' => 'activate']);
    }

    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $currentClass = $this->getCurrentClass();
        $object = new $currentClass;
        $params=$object->getFillable();
        $request->validate($object->getStoreValidations($request->get('id')));
        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }
        $object->active = '1';
        $object->save();
        return redirect('/'.$currentClass::getAlias())->with('success', 'store_success');
    }


}
