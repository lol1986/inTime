<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Timeregistry extends Model
{
    protected $fillable = ['user','date','type'];

    protected static $printable = ['user','date','type'];

    protected static $updatable = ['user','date','type'];

    protected static $readable = [];

//    protected static $storeValidations =['name' => ['max:255','unique:roles']];

    public function user()
    {
        return $this->belongsTo(User::class)->withTimestamps();
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

    public function getClassName(){
        return get_class($this);
    } 

    public static function getStoreValidations(){
        return self::$storeValidations;
    }

    public function getUpdateValidations(){

        $updateValidations=[
  //          'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}
