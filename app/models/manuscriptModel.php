<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class manuscriptModel extends Model
{
    //
    protected $table = "journal_main";
    public function figures()
    {
    	return $this->hasMany('App\models\manuscritpFiguresModel', 'id')->where('type', '=','figure');
    }
}
