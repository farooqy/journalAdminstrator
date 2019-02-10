<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class registeredUsers extends Model
{
    //
    protected $table = "users";

    public function manuscripts()
    {
    	return $this->hasMany('App\models\manuscriptModel', 'submitter');
    }
}
