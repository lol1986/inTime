<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected static $printable = ['cif','name','address'];

    public static function getPrintable()
    {
        return self::$printable;
    }

    public function getClassName(){
        return get_class($this);
    } 
}
