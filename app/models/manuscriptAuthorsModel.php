<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class manuscriptAuthorsModel extends Model
{
    protected $table = "journal_authors";
    public function manuscript()
    {
    	return $this->belongsTo('App\models\manuscriptModel', 'id');
    } 
}
