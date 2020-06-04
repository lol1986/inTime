<?php

namespace App;

use App\{Calendar};
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['date'];

    protected static $printable = ['calendar_id','date'];

    protected static $updatable = ['date'];

    protected static $readable = [];

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
            'calendar' => ['required','exists:calendars,id'],
            'date'=> ['required','date_format:Y-m-d','unique:holidays,date,NULL,id,calendar,'.$id]
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
