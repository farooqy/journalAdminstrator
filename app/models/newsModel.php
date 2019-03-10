<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class newsModel extends Model
{
    //
    protected $table = "news_update";
    public $timestamps = false;

    public function postedBy()
    {
    	return $this->belongsTo('App\User', 'updated_user_id');
    }
}
