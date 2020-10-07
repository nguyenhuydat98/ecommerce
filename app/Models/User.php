<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
