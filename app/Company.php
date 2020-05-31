<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected static $printable = ['cif','name','address'];

    protected $fillable = ['cif','name','address'];

    protected static $updatable = ['name','address'];

    protected static $readable = [];

    protected static $storeValidations =['name' => ['max:255','unique:companies']];

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
            'name' => ['required', 'string', 'max:255','unique:companies,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}