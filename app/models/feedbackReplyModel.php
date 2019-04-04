<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class feedbackReplyModel extends Model
{
    //
    protected $table = 'feedback_replies';
    public function who_replied()
    {
    	return $this->belongsTo('App\user', 'replied_by');
    }
    public function feedback()
    {
    	return $this->belongsTo('App\models\feedbackModel', 'id');
    }
}
