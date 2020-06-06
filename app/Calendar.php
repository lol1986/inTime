<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Holiday,User};

class Calendar extends Model
{
    protected static $printable = ['id','name'];

    protected $fillable = ['name'];

    protected static $alias = 'calendars';

    protected static $updatable =['name'];

    protected static $readable = [];

    protected static $storeValidations =['name' => ['required','max:255','unique:calendars']];

    public static function getAlias(){
        return self::$alias;
    }

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
    
    public function holiday()
    {
        return $this->hasMany(Holiday::class)->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany(User::class)->withTimestamps();
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
