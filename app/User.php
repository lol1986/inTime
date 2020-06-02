<?php

namespace App;

use App\{Role,Leave,Userholiday,Timeregistry};
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
    protected $fillable = ['dni','company_id','name', 'email', 'password','active','role_id'];

    protected static $printable = ['dni','company_id','name', 'email','role_id'];

    protected static $updatable = ['dni','company_id','name', 'email','role_id'];

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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function timeregistry()
    {
        return $this->hasMany(Timeregistry::class)->withTimestamps();
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class)->withTimestamps();
    }

    public function Holidays()
    {
        return $this->hasMany(Userholiday::class)->withTimestamps();
    }

    public function timeregistries()
    {
        return $this->hasMany('App\Timeregistry', 'id', 'user');
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
