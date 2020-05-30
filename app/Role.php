<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected static $printable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public static function getPrintable()
    {
        return self::$printable;
    }
    
}
