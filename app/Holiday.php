<?php

namespace App;

use App\Holiday;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['calendar','date'];

    protected static $printable = ['calendar','date'];

    protected static $updatable = ['date'];

    protected static $readable = [];

   // protected static $storeValidations =['name' => ['max:255','unique:roles']];

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
//            'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}
