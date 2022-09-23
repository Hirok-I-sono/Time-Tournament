<?php

namespace App;

use Illuminate\Database\Eloquent\Factories;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token',
        'expire_at',
    ];
}
