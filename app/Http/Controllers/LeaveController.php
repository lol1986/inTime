<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Auth,DB;

class LeaveController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Leave());
        $this->regular = true;
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentClass = $this->getCurrentClass();
        $object = new $currentClass;
        $aObject = [];
        $params=$object->getFillable();
        $readable=[];

        foreach($params as $param){
            if(substr($param, strlen($param)-3, strlen($param))=='_id'){
                $str = substr($param,0,strlen($param)-3);
                $parentClass='\\App\\'.$str;
                $all=DB::select('select * from '.$parentClass::getAlias());
                $aObject += [$str=>$all];
            }
        }

        if(Auth::user()->role->id =='3'){
            $readable ["user_id"] = "false";
        }

        return view ('private.'.$currentClass::getAlias().'.create')
        ->with(['object' => $object,'action' => __FUNCTION__,'parents'=> $aObject])->with('readable',$readable)
        ->with('class',$currentClass::getAlias());
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

        if(Auth::user()->role->id =='3'){
            $request->merge(['user_id' => Auth::user()->id]);
            
        }

        $request->validate($currentClass::getStoreValidations());
        $params=$object->getFillable();
        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }

        $start=$object->start;
        $start=date('Y-m-d', strtotime($start));
        $epoch=strtotime($start."+ ". $object->days." days");
        $end = new DateTime("@$epoch");
        $end=$end->format('Y-m-d');
        $object->end=$end;
        $object->active = '1';
        $object->save();
        
        if(Auth::user()->role->id =='3'){
            return redirect('/'.$currentClass::getAlias().'/create')->with('success', 'store_success');
        }else{
            return redirect('/'.$currentClass::getAlias())->with('success', 'store_success');
        }
    }
}
