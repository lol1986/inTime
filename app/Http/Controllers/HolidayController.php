<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;

class HolidayController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Holiday());
        $this->regular = true;
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => 'update']);
        $this->middleware('superadmin', ['only' => 'destroy']);
        $this->middleware('admin', ['only' => 'show']);
        //$this->middleware('superadmin', ['only' => 'activate']);
    }

}