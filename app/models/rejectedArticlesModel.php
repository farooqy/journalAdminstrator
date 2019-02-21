<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class rejectedArticlesModel extends Model
{
    //
    protected $table = "rejected_journals";
    protected $fillable = ["j_id", "j_man_num", "j_url", "j_time", "j_by"];
    public $timestamps = false;
    public function articleDetails()
    {
    	return $this->belongsTo('App\models\manuscriptModel');
    }
}
