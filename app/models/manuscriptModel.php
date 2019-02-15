<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class manuscriptModel extends Model
{
    //
    protected $table = "journal_main";
    public function figures()
    {
    	return $this->hasMany('App\models\manuscritpFiguresModel', 'journal_id')->where('type', '=','figure');
    }
    public function authors()
    {
    	return $this->hasMany('App\models\manuscriptAuthorsModel', 'journal_id')->where('a_status', '=','active');
    }
    public function publishedDetails()
    {
    	return $this->hasOne('App\models\manuscriptPublishDetails', 'j_id');
    }
    public function paperStatuses()
    {
        return $this->hasMany('App\models\paperStatusTrackModel', 'j_id');
    }
}
