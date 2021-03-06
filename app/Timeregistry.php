<?php

namespace App;

use App\{User};
use Illuminate\Database\Eloquent\Model;

class Timeregistry extends Model
{
    protected $fillable = ['user_id','status'];
    
    protected $hidden = ['updated_at','created_at'];

    protected static $printable = ['user_id','date','status'];

    protected static $alias = 'timeregistries';

    protected static $updatable = ['status'];

    protected static $readable = [];

   // public function user()
   // {
     //   return $this->belongsTo('App\User', 'user');
   // }
    public static function getAlias(){
        return self::$alias;        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function registryevents(){
        return $this->hasMany(Registryevent::class);
    }

    public function getHidden()
    {
        return $this->hidden;
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
