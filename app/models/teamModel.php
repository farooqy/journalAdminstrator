<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class teamModel extends Model
{
    //
    protected $table = "jtoxteam";

    public function papersChanged()
    {
    	return $this->hasMany('App\models\paperStatusTrackModel', 'whochanged_id')
    }
}
