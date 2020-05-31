<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected static $printable = ['name'];

    protected $fillable = ['name'];

    protected static $updatable =['name'];

    protected static $readable = [];

    protected static $storeValidations =['required','name' => ['max:255','unique:calendars']];

    public static function getPrintable()
    {
        return self::$printable;
    }

    public static function getReadable()
    {
        return self::$readable;
    }

    public static function getUpdatable()
    {
        return self::$updatable;
    }

    public function getClassName(){
        return get_class($this);
    } 

    public static function getStoreValidations(){
        return self::$storeValidations;
    }

    public function getUpdateValidations(){

        $updateValidations=[
            'name' => ['required', 'string', 'max:255','unique:calendars,name,'. $this->id]
        ];
         return $updateValidations;
     }
}
