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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public abstract function update(Request $request, $id);

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
