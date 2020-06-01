<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Usersholiday extends Model
{
    protected $fillable = ['user_id','start','end','days','status','active'];

    protected static $printable = ['user_id','start','end','days','status'];

    protected static $updatable = ['date'];

    protected static $readable = [];

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

    public function getStoreValidations($id){
        $storeValidations =[
            'user' => ['required','exists:users,id'],
            'start'=> ['required','date_format:Y-m-d'],
            'days'=> ['required','integer'],
            'end'=> ['required','date_format:Y-m-d','after_or_equal:start'],
            'status'=> ['required','in:peding,approved,denied']
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
