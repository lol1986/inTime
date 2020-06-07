<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usersholiday;
use Auth, DB, Datetime;

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

        $currentdays= DB::select('select holidays from users where id= ?',[Auth::user()->id]);
        if($request->get('days')>$currentdays[0]->holidays){
            return redirect('/'.$currentClass::getAlias().'/create')->with('error', 'days_error');
        }
      
        $params=$object->getFillable();
        $object->user_id = Auth::user()->id;
        $object->active = '1';
        $object->status = 'pending';

        if(Auth::user()->role->id =='3'){
            $request->merge(['user_id' => Auth::user()->id]);  
        }

        $request->validate($object->getStoreValidations($request->user_id));
        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }

        $start=$object->start;
        $start=date('Y-m-d', strtotime($start));
        $epoch=strtotime($start."+ ". $object->days." days");
        $end = new DateTime("@$epoch");
        $end=$end->format('Y-m-d');
        $object->end=$end;
        $object->save();

        if(Auth::user()->role->id =='3'){
            return redirect('/'.$currentClass::getAlias().'/create')->with('success', 'store_success');
        }else{
            return redirect('/'.$currentClass::getAlias())->with('success', 'store_success');
        }
        
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
        $readable=$object->getReadable();

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

    public function deny(Request $request){
        $currentClass = $this->getCurrentClass();
        if(is_null($request->get('id'))){
            return redirect('/'.$currentClass::getAlias())->with('class',$currentClass::getAlias());
        }else{
            if(DB::select('select status from usersholidays where id = ?',[$request->get('id')])[0]->status=='approved'){
                return redirect('/'.$currentClass::getAlias())->with('error', 'deny_error')->with('class',$currentClass::getAlias());
            }
            DB::update('update usersholidays set status = ? where id = ?', ['denied',$request->get('id')]);
            return redirect('/'.$currentClass::getAlias())->with('success', 'deny_success')->with('class',$currentClass::getAlias());
        }   
    }

    public function approve(Request $request){
        $currentClass = $this->getCurrentClass();
        if(is_null($request->get('id'))){
            return redirect('/'.$currentClass::getAlias())->with('class',$currentClass::getAlias());
        }else{
            if(DB::select('select status from usersholidays where id = ?',[$request->get('id')])[0]->status=='denied'){
                return redirect('/'.$currentClass::getAlias())->with('error', 'approve_error')->with('class',$currentClass::getAlias());;
            }
            DB::update('update usersholidays set status = ? where id = ?', ['approved',$request->get('id')]);
            return redirect('/'.$currentClass::getAlias())->with('success', 'approve_success')->with('class',$currentClass::getAlias());;
        }
    }

}
