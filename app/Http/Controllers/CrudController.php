<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role,Company,Calendar};

abstract class CrudController extends Controller
{
    public function getClassAlias(){
        return strtolower (explode("\\",$this->className)[1].'s');
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
        $object = $currentClass::orderBy('active', 'desc')->get();
        return view ('private.'.$this->getClassAlias().'.view')->with('object', $object)
        ->with('className',$this->className);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('private.'.$this->getClassAlias().'.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public abstract function store(Request $request);

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
         
                return redirect('/'.$this->getClassAlias())->with('success', '¡Usuario actualizado!');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string','in:0,1'],
                ]);

                $object =  $currentClass::find($id);
                $object->active = $request->get('active');
                $object->save();

                return redirect('/'.$this->getClassAlias())->with('success', '¡Usuario activado!');   
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
        return view('private.'.$this->getClassAlias().'.show')->with('object', $object)->with('readable',$readable);;
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
        return view('private.'.$this->getClassAlias().'.edit') ->with('object', $object)->with('readable',$readable);;
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
        return redirect('/'.$this->getClassAlias())->with('success', '¡Usuario desactivado!');
    }

}
