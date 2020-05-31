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

   // public function user()
   // {
     //   return $this->belongsTo('App\User', 'user');
   // }

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

    public function getUpdateValidations(){

        $updateValidations=[
  //          'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
     public function getStoreValidations($id){
        $storeValidations =[
            'user' => ['exists:users,id'],
            'type' => ['in:in,out,pin,pout'],
            'date'=> ['date_format:Y-m-d H:i:s']
        ];
        return $storeValidations;
    }
}
