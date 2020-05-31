<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected static $printable = ['name'];

    public static function getPrintable()
    {
        return self::$printable;
    }

    public function getClassName(){
        return get_class($this);
    } 
}
