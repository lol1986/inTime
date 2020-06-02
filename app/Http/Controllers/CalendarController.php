<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Calendar());
        $this->regular = true;
        $this->middleware('auth');
        $this->middleware('superadmin');
        //$this->middleware('superadmin', ['only' => 'activate']);
    }

}
