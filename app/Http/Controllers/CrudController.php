<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role,Company,Calendar,Holiday,Leave};
use Auth;
use DB;
use App\Filter;

abstract class CrudController extends Controller
{
    public function getCurrentClass(){
        return $this->className;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentClass = $this->getCurrentClass();
        $emptyobject = new $currentClass;
        $object = new $currentClass;
       // $filter = new Filter ($object);
       // $filter->filter();
        if(Auth::user()->role->id=='3'){
            $object = $currentClass::orderBy('active', 'desc')->where('user_id',Auth::user()->id)->paginate(5);
        }
        else{
            $object = $currentClass::orderBy('active', 'desc')->paginate(5);
        }
        return view ('private.'.$currentClass::getAlias().'.view')->with('object', $object)->with('emptyobject',$emptyobject)
        ->with('className',$this->className)->with('class',$currentClass::getAlias())->with('action',__FUNCTION__);
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
        foreach($params as $param){
            if(substr($param, strlen($param)-3, strlen($param))=='_id'){
                $str = substr($param,0,strlen($param)-3);
                $parentClass='\\App\\'.$str;
                $all=DB::select('select * from '.$parentClass::getAlias());
                $aObject += [$str=>$all];
            }
        }
        return view ('private.'.$currentClass::getAlias().'.create')
        ->with(['object' => $object,'action' => __FUNCTION__,'parents'=> $aObject])
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
        $request->validate($currentClass::getStoreValidations());
        $params=$object->getFillable();
        foreach ($params as $param){
            $object->$param =  $request->get($param);
        }
        $object->active = '1';
        $object->save();
        return redirect('/'.$currentClass::getAlias())->with('success', 'store_success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = $request->get('action');
        $currentClass = $this->getCurrentClass();

        switch ($action){
            case 'update':
                $object = $currentClass::find($id);
                $request->validate($object->getUpdateValidations($id));
                $params=$object->getUpdatable();
                foreach ($params as $param){
                    $object->$param =  $request->get($param);
                }
                $object->active = $object->active;
                $object->save();
         
                return redirect('/'.$currentClass::getAlias())->with('success', 'update_success');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string','in:0,1'],
                ]);

                $object =  $currentClass::find($id);
                $object->active = $request->get('active');
                $object->save();

                return redirect('/'.$currentClass::getAlias())->with('success', 'activate_success');   
            break;

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentClass = $this->getCurrentClass();
        $object = $currentClass::find($id);
        $print= $currentClass::getPrintable();
        $readable=[];
        foreach ($print as $param){
            $readable[$param] = 'false';
        }
        return view('private.'.$currentClass::getAlias().'.show')
        ->with('object', $object)->with('readable',$readable)->with('class',$currentClass::getAlias())->with('action',__FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentClass = $this->getCurrentClass();
        $object = $currentClass::find($id);
        $readable = $currentClass::getReadable();
        return view('private.'.$currentClass::getAlias().'.edit') 
        ->with('object', $object)->with('readable',$readable)->with('class',$currentClass::getAlias())->with('action',__FUNCTION__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http$usuario->email\Response
     */
    public function destroy($id)
    {
        $currentClass = $this->getCurrentClass();
        $object = $currentClass::find($id);
        $object->active ='0';
        $object->save();
        return redirect('/'.$currentClass::getAlias())->with('success', 'deactivate_success');
    }
    
    public function filter(Request $request){
        unset($request['_token']);
        
        $currentClass = $this->getCurrentClass();
        $emptyobject = new $currentClass;
        $object = new $currentClass;
        $queryKeys = array_keys ($request->all());
        $queryParams = $request->all();

        $query = $currentClass::orderBy('active', 'desc');

        if(Auth::user()->role->id=='3'){
            $query = $object->where('user_id',Auth::user()->id)->paginate(5);
        }

        foreach($queryKeys as $paramKey){
            //Si el parametro no es nulo
            if($queryParams[$paramKey]){
                //Si existe en los parámetros definidos como mostrables para la clase
                if (in_array($paramKey,$object->getPrintable())){
                    $query=$query->where($paramKey,'LIKE','%'.$queryParams[$paramKey].'%');
                }
            }
        }
        $object = $query->paginate(5);
        return view('private.'.$currentClass::getAlias().'.view')->with('class',$currentClass::getAlias()) 
        ->with('object', $object) ->with('emptyobject', $emptyobject)->with('action',__FUNCTION__);
    }

}
