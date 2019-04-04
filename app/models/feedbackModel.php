<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class feedbackModel extends Model
{
    //
    protected $table = "feedback";
    public $timestamps = false;

    
    public function replies()
    {
    	return $this->hasMany('App\models\feedbackReplyModel', 'feedback_id');
    }
}
