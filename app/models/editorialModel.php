<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class editorialModel extends Model
{
    //
    protected $table = "editors";

    public function editorRoles()
    {
    	// $this->setPrimaryKey('roles_id');
    	return $this->belongsTo('App\models\editorRolesModel','role_id', 'role_id');
    }
}
