<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->className = get_class(new Company());
        $this->regular = false;
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('superadmin', ['only' => ['activate','destroy','edit','create']]);
    }

}
