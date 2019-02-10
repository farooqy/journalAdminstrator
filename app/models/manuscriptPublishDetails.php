<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class manuscriptPublishDetails extends Model
{
    //
    protected $table = "published_journals";
    public function manuscript()
    {
    	return $this->belongsTo('App\models\manuscriptModel', 'id');
    } 
}
