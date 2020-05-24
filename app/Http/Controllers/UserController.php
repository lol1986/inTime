<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('private.users.view', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('private.users.create');
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
    
        $cliente->save();
    
        return redirect('/users')->with('success', '¡Usuario guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('private.users.edit', compact('usuario'));
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
                    'dni' => ['regex:/^[0-9]{8}[a-zA-Z]|[XYZxyz][0-9]{7}[a-zA-z]$/','unique:users'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
               
                $usuario = User::find($id);
                $usuario->company =  $request->get('company');
                $usuario->dni =  $request->get('dni');
                $usuario->name = $request->get('name');
                $usuario->email = $request->get('email');
                $usuario->active = $request->get('active');
                $usuario->save();
         
                return redirect('/users')->with('success', '¡Usuario actualizado!');
            break;
            
            case 'activate':
                $request->validate([
                    'active' => ['required', 'string'],
                ]);

                $usuario = User::find($id);
                $usuario->active = $request->get('active');
                $usuario->save();

                return redirect('/users')->with('success', '¡Usuario activado!');   
            break;

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http$usuario->email\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->active ='0';
        $usuario->save();
        return redirect('/users')->with('success', '¡Usuario desactivado!');
    }

    public function activate($id)
    {
        $usuario = User::find($id);
        $usuario->active ='1';
        $usuario->save();
        return redirect('/users')->with('success', '¡Usuario activado!');
    }
}
