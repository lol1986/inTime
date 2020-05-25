<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $printable = ['cif','name','address'];

    public function getPrintable()
    {
        return $this->printable;
    }
}
