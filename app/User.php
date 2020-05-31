<?php

namespace App;

use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','company','name', 'email', 'password','active'];

    protected static $printable = ['dni','company','name', 'email'];

    protected static $updatable = ['dni','company','name', 'email'];

    protected static $readable = [
        'dni' => 'false',
        'company' => 'false',
    ];

    protected static $storeValidations = [
        'dni' => ['regex:/^[0-9]{8}[a-zA-Z]|[XYZxyz][0-9]{7}[a-zA-z]$/','unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
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
        return $storeValidations;
    }
    
    
    public function getUpdateValidations(){

       $updateValidations=[
           'company'=> ['required','exists:companies,id','integer'],
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $this->id],
           'active'=>['in:1,0'],
       ];
        return $updateValidations;
    }
    
}
