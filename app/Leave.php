<?php

namespace App;

use App\{User};
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['user_id','start','end','days'];

    protected static $printable = ['user_id','start','end','days'];

    protected static $updatable = ['user_id','start','end','days'];

    protected static $readable = [];

//    protected static $storeValidations =['name' => ['max:255','unique:roles']];

    public function user()
    {
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
