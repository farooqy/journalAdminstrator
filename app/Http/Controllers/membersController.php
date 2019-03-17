<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\editorialModel;
use App\models\editorRolesModel;
use DateTime;
use Auth;

class membersController extends Controller
{
    //
    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
    }

    public function activeMembers()
    {
    	$this->isLoggedInCheck();
    	$rolesModel = new editorRolesModel;
    	$roleList = 	$rolesModel::with(['editorsInThisRole' => function($query){
    		$query->where('ed_status','active');
    	}])->get();

    	return view("editorsPage.editorsList", compact('roleList'));
    }
    public function addNewRole()
    {
        $this->isLoggedInCheck();
        $existingRoles = editorRolesModel::where('role_status', 'active')->get();
        return view('editorsPage.addNewRole', compact('existingRoles'));
    }
    public function viewExistingRoles()
    {
        $this->isLoggedInCheck();
        $existingRoles = editorRolesModel::with(['editorsInThisRole' => function($query){
            $query->where('ed_status','active');
        }])->get();
        return view('editorsPage.existingRoles', compact('existingRoles'));

    }
    public function showDeactivatedMembers()
    {
        $this->isLoggedInCheck();
        $membersModel = new editorialModel;
        $membersList = $membersModel::where('ed_status', 'inactive')->get();

        return view("editorsPage.inactiveMembers", compact('membersList'));
    }

    public function addNewMember()
    {
        $this->isLoggedInCheck();
        $roles = editorRolesModel::where('role_status', 'active')->get();
        return view('editorsPage.addNewMember', compact('roles'));
    }

    public function deactivateMember($memberId)
    {
        $this->doActivateDeactivateMember($memberId, 'inactive');

        $membersModel = new editorialModel;
        $membersList = $membersModel::where('ed_status', 'inactive')->get();
        return view("editorsPage.inactiveMembers", compact('membersList'));
    }
    public function activateMember($memberId)
    {
        $this->doActivateDeactivateMember($memberId, 'active');
        $roleList = editorRolesModel::with(['editorsInThisRole' => function($query){
            $query->where('ed_status','active');
        }])->get();

        return view("editorsPage.editorsList", compact('roleList'));
    }
    protected function doActivateDeactivateMember($memberId, $target_status = 'active')
    {
        if($target_status === 'active')
        {
            $current_status = 'inactive';
            $action = 'activated';
        }    
        else
        {
            $current_status = 'active';
            $action = "deactivated";
        }   
        $this->isLoggedInCheck();
        $member = editorialModel::where([['ed_status', '=', $current_status], ['ed_id', '=', $memberId]])->get();
        if($member === null || count($member) <= 0)
        {
            session()->flash('error', 'The editor you are trying to deactivate/activate is already inactive/active or /doesnt\' exist');
        }
        else
        {
            try
            {
                editorialModel::where('ed_id', $memberId)->update(['ed_status'=> $target_status]);
                session()->flash('success', 'successfully '.$action.' member');
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                session()->flash('error', $e->getMessage());
            }
            
        }
    }

    public function deactivateRole($roleId)
    {
        $this->doAactivateDeactivateRole($roleId, "inactive");
        $existingRoles = editorRolesModel::with(['editorsInThisRole' => function($query){
            $query->where('ed_status','active');
        }])->get();
        return view('editorsPage.existingRoles', compact('existingRoles'));
    }
    public function activateRole($roleId)
    {
        $this->doAactivateDeactivateRole($roleId, "active");
        $existingRoles = editorRolesModel::with(['editorsInThisRole' => function($query){
            $query->where('ed_status','active');
        }])->get();
        return view('editorsPage.existingRoles', compact('existingRoles'));
    }

    protected function doAactivateDeactivateRole($roleId, $target_status ='active')
    {
        $this->isLoggedInCheck();
        if($target_status === 'active')
        {
            $current_status = "inactive";
            $action = "acivated";
        }
        else
        {
            $current_status = "active";
            $action = "deactivated";
        }
        $role = editorRolesModel::where([['role_id','=' ,$roleId],
         ['role_status', '=', $current_status]])->with(['editorsInThisRole' => function($query){
            $query->where('ed_status','active');
        }])->get();

        if($role === null || count($role) <= 0)
        {
            session()->flash('error', 'The role you are trying to activate/deactivate is already active/inactive, or doesn\'t exist at the moment');
        }
        else if(count($role[0]->editorsInThisRole) > 0 && $target_status === 'inactive')
        {
            session()->flash('error', 'The role you are trying to deactive contains active members. Please deactivate the members before deactivating the role itself');
        }
        else
        {
            try
            {
                editorRolesModel::where('role_id', $roleId)->update(['role_status' => $target_status]);
                session()->flash('success', 'successfully '.$action.' the '.$role[0]->role_name.' role');
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                session()->flash('error', $e->getMessage());
            }
        }
    }

    public function viewMembersInGivenRole($roleId)
    {
        $this->isLoggedInCheck();
        $membersList = editorialModel::where('role_id', $roleId)->get();
        if($membersList === null || count($membersList) <= 0)
        {
            return view('editorsPage.roleNotExist');
        }
        else
        {
            return view('editorsPage.roleMembers', compact('membersList'));
        }
    }

    public function getRoleIndex(Request $roleForm)
    {
        $roleForm->validate([
            'roleIndexValue' => 'required|integer'
        ]);
        $roleIndex = editorialModel::where('role_id', $roleForm->roleIndexValue)->orderBy('role_index', 'desc')->first()->get();
        if($roleIndex === null || count($roleIndex) <= 0)
        {
            return json_encode(array("error" => 'could not find the role index'));
        }
        else
            return json_encode(array('success' => true, 'indexValue' => $roleIndex[0]->role_index));
    }

    public function saveNewMember(Request $editorForm)
    {
        $this->isLoggedInCheck();

        $editorForm->validate([
            'edEmail' => 'required|email',
            'edTitle' => 'required|string|min:2',
            'edFullName' => 'required|string',
            'edInstitute' => 'required|string',
            'edDepartment' => 'required|string',
            'edLocation' => 'required|string',
            'edRole' => 'required|integer',
            'edRoleIndex' => 'required|integer',

        ]);
        $isExistingEditor = editorialModel::where('ed_email', $editorForm->edEmail)->get();
        $authorOfSamelevel = editorialModel::where([['role_id', '=', $editorForm->edRole],
            ['role_index', '=', $editorForm->edRoleIndex]])->get();

        if($isExistingEditor !== null && count($isExistingEditor) > 0)
            session()->flash('error', 'An editor with similar email already exist');
        else if($authorOfSamelevel !== null && count($authorOfSamelevel) > 0)
            session()->flash('error', 'There exist an author with same role and index, please use higher or lower index than '.$editorForm->$edRoleIndex.' to add this author');
        else
        {
            $roleToken = editorRolesModel::where('role_id', $editorForm->edRole)->get()[0]->role_token;

            $editorModel = new editorialModel;
            $editorModel->ed_email = $editorForm->edEmail; 
            $editorModel->ed_title = $editorForm->edTitle; 
            $editorModel->ed_name = $editorForm->edFullName; 
            $editorModel->ed_institute = $editorForm->edInstitute; 
            $editorModel->ed_department = $editorForm->edDepartment; 
            $editorModel->ed_location = $editorForm->edLocation; 
            $editorModel->ed_status = 'active'; 
            $editorModel->role_id = $editorForm->edRole; 
            $editorModel->role_token = $roleToken; 
            $editorModel->role_index = $editorForm->edRoleIndex; 
            try
            {
                $editorModel->save();
                session()->flash('success', 'successfully added new editor');
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                session()->flash('error', $e->getMessage());
            }
            

        }
        $roles = editorRolesModel::where('role_status', 'active')->get();

        return view('editorsPage.addNewMember', compact('roles'));
    }
    public function saveNewRole(Request $roleForm)
    {
        $roleForm->validate([
            'roleName' => 'required|string'
        ]);

        $roleExist = editorRolesModel::where('role_name' , $roleForm->roleName)->get();
        if($roleExist !==  null && count($roleExist) > 0)
        {
            session()->flash('error', 'Role with similar name already exist');
        }
        else
        {
            try
            {
                $dt = new DateTime();
                $roleModel = new editorRolesModel;
                $roleModel->role_name = $roleForm->roleName;
                $roleModel->role_time = time();
                $roleModel->role_token = hash('md5', time());
                $roleModel->role_status = 'active';
                $roleModel->created_at = new DateTime();

                $roleModel->save();
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                session()->flash('error', $e->getMessage());
            }
        }
        $existingRoles = editorRolesModel::where('role_status', 'active')->get();
        return view('editorsPage.addNewRole',compact('existingRoles'));
    }
        
}
