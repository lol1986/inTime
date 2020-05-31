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
        $this->regular = true;
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
        $request->validate(User::getStoreValidations());
    
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('auth.register');
    }

}
