<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'first_name', 'last_name', 'mobile_number', 'address', 'email', 'password', 'role'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
