<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    protected $fillable = ['date','player_id','place_id','tournament_id','event_id','result','memo','image'];

    public function player(){
        return $this->belongsTo('App\Player','player_id','playerid');
    }

    public function plece(){
        return $this->belongsTo('App\Place','place_id','placeid');
    }

    public function event(){
        return $this->belongsTo('App\Event','event_id','eventid');
    }

    public function tournament(){
        return $this->belongsTo('App\Tournament','tournament_id','tourid');
    }
}
