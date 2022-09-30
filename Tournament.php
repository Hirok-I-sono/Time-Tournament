<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = ['tourname'];
    protected $primaryKey = 'tourid';
}
