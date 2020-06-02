<?php

namespace App;

use App\{User};
use Illuminate\Database\Eloquent\Model;

class Timeregistry extends Model
{
    protected $fillable = ['user_id','status'];

    protected static $printable = ['user_id','status'];

    protected static $updatable = ['status'];

    protected static $readable = [];

   // public function user()
   // {
     //   return $this->belongsTo('App\User', 'user');
   // }

    public function user(){
        return $this->belongsTo(User::class);
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

    public function getUpdateValidations(){

        $updateValidations=[
  //          'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
     public function getStoreValidations($id){
        $storeValidations =[
            'user_id' => ['required','exists:users,id'],
            'type' => ['required','in:in,out,pin,pout'],
            'date'=> ['required','date_format:Y-m-d H:i:s']
        ];
        return $storeValidations;
    }
}
