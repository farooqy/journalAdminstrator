<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\editorialModel;
class editorRolesModel extends Model
{
    //
    protected $table = "roles";
    
    public function editorsInThisRole()
    {
    	return $this->hasMany('App\models\editorialModel', 'role_id', 'role_id');
    }
}
