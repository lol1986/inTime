<?php

namespace App;

use App\{User};
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['user_id','start','days'];

    protected static $printable = ['user_id','start','days'];

    protected static $alias = 'leaves';

    protected static $updatable = ['user_id','start','end','days'];

    protected static $readable = ['end'=>'false','id'=>'false'];

//    protected static $storeValidations =['name' => ['max:255','unique:roles']];
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
            'user_id' => ['required','not_in:0','exists:users,id'],
            'days'=> ['required','integer'],
            'start'=> ['required','date_format:Y-m-d'],
        ];
        return $storeValidations;
    }

    public function getUpdateValidations(){

        $updateValidations=[
            'user_id' => ['required','not_in:0','exists:users,id'],
            'days'=> ['required','integer'],
            'start'=> ['required','date_format:Y-m-d']
//          'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}
