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
        $this->className = get_class(new User());
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
        $this->middleware('admin', ['only' => 'show']);
        $this->middleware('admin', ['only' => 'index']);
        //$this->middleware('superadmin', ['only' => 'activate']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('active', 'desc')->get();
        return view ('private.users.view')->with('object', $user)
        ->with('className',$this->className);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $print= User::getPrintable();
        $readable=[];
        foreach ($print as $param){
            $readable[$param] = 'false';
        }
        return view('private.users.show')->with('object', $user)->with('readable',$readable)
        ->with('className',$this->className);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $readable = User::getReadable();
        return view('private.users.edit') ->with('object', $user)->with('readable',$readable)
        ->with('className',$this->className);;
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

}
