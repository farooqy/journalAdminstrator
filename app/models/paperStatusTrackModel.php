<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class paperStatusTrackModel extends Model
{
    //
    protected $table = "paper_status_track";

    public function papers()
    {
    	return $this->belongsTo('App\models\manuscriptModel');
    }
    public function whochanged()
    {
    	return $this->belongsTo('App\models\teamModel');
    }
}
