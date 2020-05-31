<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends CrudController
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new User());
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
        $this->middleware('admin', ['only' => 'show']);
        $this->middleware('admin', ['only' => 'index']);
        //$this->middleware('superadmin', ['only' => 'activate']);
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
            'dni' => ['regex:/^[0-9]{8}[a-zA-Z]|[XYZxyz][0-9]{7}[a-zA-z]$/','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        $usuario = new User([
            'dni' => $request->get('dni'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('email'),
        ]);
    
        $usuario->save();
    
        return redirect('/users')->with('success', '¡Usuario guardado!');
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
                $usuario = User::find($id);

                $request->validate([
                    'company'=> ['required','exists:companies,id','integer'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $usuario->id],
                    'active'=>['in:1,0'],
                ]);

                $usuario->company =  $request->get('company');
                $usuario->name = $request->get('name');
                $usuario->email = $request->get('email');
                $usuario->active = $usuario->active;
                $usuario->save();
         
                return redirect('/users')->with('success', '¡Usuario actualizado!');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string','in:0,1'],
                ]);

                $usuario = User::find($id);
                $usuario->active = $request->get('active');
                $usuario->save();

                return redirect('/users')->with('success', '¡Usuario activado!');   
            break;

        }
        
    }
}
