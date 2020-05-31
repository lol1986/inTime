<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
        $this->middleware('admin', ['only' => 'show']);
        //$this->middleware('superadmin', ['only' => 'activate']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'desc')->get();
        return view ('private.roles.view')->with('object', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('private.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['max255','unique:roles'],
        ]);
    
        $role = new Role([
            'name' => $request->get('name'),
        ]);
    
        $role->save();
    
        return redirect('/roles')->with('success', '¡Rol guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $print= Role::getPrintable();
        $readable=[];
        foreach ($print as $param){
            $readable[$param] = 'false';
        }
        return view('private.roles.show')->with('object', $role)->with('readable',$readable);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('private.roles.edit')->with('object', $role);;
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

        switch ($action){
            case 'update':
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                ]);
               
                $role = Role::find($id);
                $role->name =  $request->get('name');
                $role->active = $role->active;
                $role->save();
         
                return redirect('/roles')->with('success', '¡Rol actualizado!');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string'],
                ]);

                $usuario = Role::find($id);
                $usuario->active = $request->get('active');
                $usuario->save();

                return redirect('/roles')->with('success', '¡Usuario activado!');   
            break;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->active ='0';
        $role->save();
        return redirect('/users')->with('success', '¡Rol desactivado!');
    }

}
