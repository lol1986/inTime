<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeregistry;
use App\User;
use Auth; 

class OwnerController extends CrudController
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
        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }
        $object->active = '1';
        $object->save();
        
        if($request->get('name') && $request->get('name')=='home'){
            return redirect('/home')->with('success', 'store_success');                
        }else{
            return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'store_success');                
        }
        
    }


    public function index()
    {
        $currentClass = $this->getCurrentClass();
        $userId = Auth::user()->id;
       // dd($userId);
        $user = Auth::user();
        if($user->hasRole('user')){
            $object = $currentClass::orderBy('active', 'desc')->where('user', '=',$userId)->paginate(10);
            return view ('private.'.$this->getClassAlias($this->regular).'.view')->with('object', $object)
            ->with('className',$this->className)->with('class',$this->getClassAlias($this->regular));
        }else{
            $object = $currentClass::orderBy('active', 'desc')->paginate(10);
            return view ('private.'.$this->getClassAlias($this->regular).'.view')->with('object', $object)
            ->with('className',$this->className)->with('class',$this->getClassAlias($this->regular));
        }
        
    }

}
