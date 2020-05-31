<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role,Company,Calendar,Holiday,Leave};

abstract class CrudController extends Controller
{
    public function getClassAlias($regular = true){
        if ($regular == 'true'){
            return strtolower (explode("\\",$this->className)[1].'s');
        }else{
            return strtolower (substr(explode("\\",$this->className)[1],0,strlen(explode("\\",$this->className)[1])-1).'ies');
        }
    }

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
        $object = $currentClass::orderBy('active', 'desc')->paginate(5);
        return view ('private.'.$this->getClassAlias($this->regular).'.view')->with('object', $object)
        ->with('className',$this->className)->with('class',$this->getClassAlias($this->regular));
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
        return view ('private.'.$this->getClassAlias($this->regular).'.create')->with('object', $object)
        ->with('class',$this->getClassAlias($this->regular));;
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
        return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'store_success');
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

                $request->validate($object->getUpdateValidations());
                $params=$object->getUpdatable();
                foreach ($params as $param){
                    $object->$param =  $request->get($param);
                }
                $object->active = $object->active;
                $object->save();
         
                return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'update_success');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string','in:0,1'],
                ]);

                $object =  $currentClass::find($id);
                $object->active = $request->get('active');
                $object->save();

                return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'activate_success');   
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
        return view('private.'.$this->getClassAlias($this->regular).'.show')
        ->with('object', $object)->with('readable',$readable) ->with('class',$this->getClassAlias($this->regular));;
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
        return view('private.'.$this->getClassAlias($this->regular).'.edit') 
        ->with('object', $object)->with('readable',$readable)->with('class',$this->getClassAlias($this->regular));;
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
        return redirect('/'.$this->getClassAlias($this->regular))->with('success', 'deactivate_success');
    }

}
