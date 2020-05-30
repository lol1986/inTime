<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $printable = ['name'];

    public function getPrintable()
    {
        return $this->printable;
    }
}
