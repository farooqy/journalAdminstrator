<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class publishedArticlesModel extends Model
{
    //
    protected $table = "published_journals";
    protected $fillable = ["j_id", "j_man_num", "j_url", "j_time", "j_by"];
    public $timestamps = false;
    public function articleDetails()
    {
    	return $this->belongsTo('App\models\manuscriptModel');
    }
}
