<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Calendar,Company,Timeregistry};
Use PDF, App, DB;

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


    public function status ($id){
        $user = new User;
        $userData = DB::select('select cif, c.name as companies_name, c.name as companies_name, c.address as companies_address,
        c.holidays as companies_holidays, ca.name as calendars_name,
        u.name as users_name, email, role_id, u.holidays as users_holidays, pending, dni, company_id, calendar_id from companies c, calendars ca, users u where c.id = u.company_id and ca.id = u.calendar_id and u.id = ?', [$id,$id,$id]);
        //Sacar parametros hidden y otros del Json
        foreach ($user->getHidden() as $param){
          unset($userData[0]->$param);
        }

        unset($userData[0]->created_at);
        unset($userData[0]->updated_at);
        unset($userData[0]->email_verified_at);

        $events=DB::select('select t.id, user_id, status, t.date as timeregistries_date, timeregistry_id, r.id, r.date as registryevents_date, type from timeregistries t, registryevents r where t.user_id = ?', [$id]);
        $registry = new Timeregistry;
        foreach ($registry->getHidden() as $param){
            unset($events[0]->$param);
        }
        
        //json_encode($array)
 //       dd($userData);
        $header = view('partials.private.header')->render();
        $companyview = view('private.reports.printobject')
        ->with(['class'=>'companies','object'=>json_encode($userData),'emptyobject'=>$user]);
       
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($header.view('private.reports.userstatus')->with('object2',json_encode($events))->with('object',json_encode($userData))->with('class','users')->render());
     //  return $pdf->download('status.pdf');
       // dd($leaves);
        
      //  $empresa = Company::orderBy('active','desc')->where('id','mec');
       // dd($calendar);
       return(view('private.reports.userstatus')->with('object',json_encode($userData))->with('object2',json_encode(json_encode($events))));
    }

}
