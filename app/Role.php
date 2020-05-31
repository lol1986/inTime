<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','active'];

    protected static $printable = ['name'];

    protected static $updatable = ['name'];

    protected static $readable = [];

    protected static $storeValidations =['name' => ['max:255','unique:roles']];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
            'name' => ['required', 'string', 'max:255']
        ];
         return $updateValidations;
     }
    
}
