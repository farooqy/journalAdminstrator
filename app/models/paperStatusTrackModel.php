<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class paperStatusTrackModel extends Model
{
    //
    protected $table = "paper_status_track";

    public function paperStatuses ()
    {
    	return $this->belongsTo('App\models\manuscriptModel');
    }
}
