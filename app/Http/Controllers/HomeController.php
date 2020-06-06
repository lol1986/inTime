<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastEvent=$lastRegistry=DB::select('select * from timeregistries where id=(select max(id) as id from timeregistries group by user_id having user_id= ?)', [Auth::user()->id]);
        return view('home')->with('lastEvent',$lastEvent);
    }
}
