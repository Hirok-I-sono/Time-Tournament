<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['placename','let','lng'];
    protected $primaryKey = 'placeid';

}
