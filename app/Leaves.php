<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $fillable = ['user','start','end','days'];

    protected static $printable = ['user','start','end','days'];

    protected static $updatable = ['user','start','end','days'];

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
