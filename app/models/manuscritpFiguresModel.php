<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class manuscritpFiguresModel extends Model
{
    //

	protected $table = "journal_figures";
    public function manuscript()
    {
    	return $this->belongsTo('App\models\manuscriptModel', 'journal_id');
    } 
}
