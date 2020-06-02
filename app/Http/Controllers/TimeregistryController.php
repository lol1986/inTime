<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeregistry;
use App\User;
use Auth; 
use DB;

class TimeregistryController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Timeregistry());
        $this->regular = false;
       // $this->middleware('user');
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
      //  $this->middleware('admin', ['only' => ['index','show']]);
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
        $date=$request->get('date');
        $type=$request->get('type');

        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }
        
        $object->active = '1';
      //  $object->save();
       
        switch($request->get('type')){

            //falta validar que el último está cerrado
            case 'in':
                DB::beginTransaction();
                    $lastRegistry=DB::select('select status from timeregistries where id=(select max(id) as id from timeregistries group by user_id having user_id= ?)', [Auth::user()->id]);
                    if($lastRegistry[0]->status=='closed'){
                        DB::insert('insert into timeregistries (user_id, status, active) values (?, ?, ?)', [Auth::user()->id, 'open','1']);
                        $currentid=DB::select('select max(id) as id from timeregistries group by user_id having user_id= ?', [Auth::user()->id]);
                        DB::insert('insert into registryevents (timeregistry_id, type, date, active) values (?, ?, ?, ?)', [$currentid[0]->id, $type ,$date,'1']);
                    }else{
                        return redirect('/home')->with('error', 'already_opened');
                    }
                DB::commit();
            break;

            //falta validar que el último está abierto
            case 'out':
                DB::beginTransaction();
                    $lastRegistry=DB::select('select * from timeregistries where id=(select max(id) as id from timeregistries group by user_id having user_id= ?)', [Auth::user()->id]);
                    if($lastRegistry[0]->status=='open'){
                        $lastevent =DB::select('Select * from registryevents where id =(Select max(id) from registryevents where timeregistry_id =?)',[$lastRegistry[0]->id]);
                            if($lastevent[0]->type=='pin'){
                                return redirect('/home')->with('error', 'exists_pause');        
                            }
                            else{
                                $currentid=DB::select('select max(id) as id from timeregistries group by user_id having user_id= ?', [Auth::user()->id]);
                                DB::insert('insert into registryevents (timeregistry_id, type, date, active) values (?, ?, ?, ?)', [$currentid[0]->id, $type ,$date,'1']);
                                DB::update('update timeregistries set status = ? where id = ?', ['closed',$currentid[0]->id]);
                            }    
                    }else{
                        return redirect('/home')->with('error', 'not_opened');
                    }
                DB::commit();    
            break;


            case 'pin':
                $lastRegistry=DB::select('select * from timeregistries where id=(select max(id) as id from timeregistries group by user_id having user_id= ?)', [Auth::user()->id]);
                if($lastRegistry[0]->status=='open'){
                    $lastevent =DB::select('Select * from registryevents where id =(Select max(id) from registryevents where timeregistry_id =?)',[$lastRegistry[0]->id]);
                    if($lastevent[0]->type=='pout' || $lastevent[0]->type=='in'){
                        DB::beginTransaction();
                        $currentid=DB::select('select max(id) as id from timeregistries group by user_id having user_id= ?', [Auth::user()->id]);
                        DB::insert('insert into registryevents (timeregistry_id, type, date, active) values (?, ?, ?, ?)', [$currentid[0]->id, $type ,$date,'1']);
                         }else{
                            return redirect('/home')->with('error', 'already_paused');
                         }
                    }
                    else{
                        return redirect('/home')->with('error', 'not_opened');
                    }
                DB::commit();
            break;

            case 'pout':
                $lastRegistry=DB::select('select * from timeregistries where id=(select max(id) as id from timeregistries group by user_id having user_id= ?)', [Auth::user()->id]);
                if($lastRegistry[0]->status=='open'){
                    $lastevent =DB::select('Select * from registryevents where id =(Select max(id) from registryevents where timeregistry_id =?)',[$lastRegistry[0]->id]);
                    if($lastevent[0]->type=='pin'){
                        DB::beginTransaction();
                        $currentid=DB::select('select max(id) as id from timeregistries group by user_id having user_id= ?', [Auth::user()->id]);
                        DB::insert('insert into registryevents (timeregistry_id, type, date, active) values (?, ?, ?, ?)', [$currentid[0]->id, $type ,$date,'1']);
                         }else{
                            return redirect('/home')->with('error', 'not_paused');
                         }
                    }
                    else{
                        return redirect('/home')->with('error', 'not_opened');
                    }
                DB::commit();
            break;

        }
         
        if($request->get('name') && $request->get('name')=='home'){
            return redirect('/home')->with('success', 'store_success');                
        }else{
            return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'update_success');                
        }
        
    }

}
