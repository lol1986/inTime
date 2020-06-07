<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Usersholiday extends Model
{
    protected $fillable = ['user_id','start','days','end'];

    protected static $printable = ['id','user_id','start','end','days','status'];

    protected static $updatable = ['date'];

    protected static $alias = 'usersholidays';

    protected static $readable = ['end'=>'false','id'=>'false'];

    public static function getAlias(){
        return self::$alias;        
    }

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

    public function getStoreValidations(){
        $storeValidations =[
            'user_id' => ['required','exists:users,id'],
            'days'=> ['required','integer'],
            'start'=> ['required','date_format:Y-m-d','after:today'],
            //'end'=> ['required','date_format:Y-m-d','after:start'],
        ];
        return $storeValidations;
    }

    public function getUpdateValidations(){

        $updateValidations=[
//            'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}
