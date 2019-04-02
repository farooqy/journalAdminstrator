<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class resentArticlesModel extends Model
{
    //
    protected $table = "resent_journals";
    protected $fillable = ["j_id", "j_man_num", "j_url", "j_time", "j_by"];
    public $timestamps = false;
    public function articleDetails()
    {
    	return $this->belongsTo('App\models\manuscriptModel')->orderBy('id', 'desc');
    }
}
