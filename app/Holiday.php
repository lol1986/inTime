<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['calendar','date'];

    protected static $printable = ['calendar','date'];

    protected static $updatable = ['date'];

    protected static $readable = [];

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

    public function getStoreValidations($id){
        $storeValidations =[
            'calendar' => ['exists:calendars,id'],
            'date'=> ['date_format:Y-m-d','unique:holidays,date,NULL,id,calendar,'.$id]
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
