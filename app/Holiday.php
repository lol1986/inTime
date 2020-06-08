<?php

namespace App;

use App\{Calendar};
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['calendar_id','date'];
    
    protected static $alias = 'holidays';

    protected static $printable = ['id','calendar_id','date'];

    protected static $updatable = ['date'];

    protected static $readable = [];


    public static function getAlias(){
        return self::$alias;
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
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

    public function getStoreValidations($id){
        $storeValidations =[
            'calendar_id' => ['required','exists:calendars,id'],
            'date'=> ['required','after:'.date_create('now')->format('Y-m-d'),'date_format:Y-m-d','unique:holidays,date,NULL,id,calendar_id,'.$id]
        ];
        return $storeValidations;
    }

    public function getUpdateValidations($id){

        $updateValidations=[
            'calendar_id' => ['required','exists:calendars,id'],
            'date'=> ['required','after:'.date_create('now')->format('Y-m-d'),'date_format:Y-m-d','unique:holidays,date,NULL,id,calendar_id,'.$id]
        ];
         return $updateValidations;
     }
    
}
