<?php

namespace App;
use App\{User};
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected static $printable = ['id','cif','name','address'];

    protected $fillable = ['cif','name','address'];

    protected static $updatable = ['name','address'];

    protected static $readable = [];

    protected static $storeValidations =[
        'name' => ['required', 'max:255','unique:companies'],
        'address'=>['required', 'max:255'],
        'cif'=>['required', 'max:255','regex:/^[a-zA-Z]{1}\d{7}[a-zA-Z0-9]{1}$/']
    ];

    public static function getPrintable()
    {
        return self::$printable;
    }

    public static function getReadable()
    {
        return self::$readable;
    }

    public function users()
    {
        return $this->hasMany(User::class)->withTimestamps();
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
 //           'name' => ['required', 'string', 'max:255','unique:companies,name,'. $this->id]
        ];
         return $updateValidations;
     }
    
}