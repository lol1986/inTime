<?php

namespace App;

use App\{User};
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    protected static $printable = ['id','name'];

    protected static $alias = 'roles';

    protected static $updatable = ['id','name'];

    protected static $readable = [];

    protected static $storeValidations =['name' => ['required','max:255','unique:roles']];

    public static function getAlias(){
        return self::$alias;    
    }

    public function users()
    {
        return $this->hasMany(User::class)->withTimestamps();
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
            'name' => ['required', 'string', 'max:255','unique:roles,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}
