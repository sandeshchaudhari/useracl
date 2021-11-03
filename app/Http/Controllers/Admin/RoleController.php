<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles=Role::get();
        return view('admin.role.index',compact('roles'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
          if ($validator->fails()) {
            Session::flash('error','Please Provide Valid Details');                
            return Redirect::back()->withErrors($validator)->withInput();
        } 
        $role = Role::create(['name' => $request->name]);
        Session::flash('success','Role created successfully');
        return redirect()->back();
    }

    public function updateRole(Request $request){

    	 $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
          if ($validator->fails()) {
            Session::flash('error','Please Provide Valid Details');                
            return Redirect::back()->withErrors($validator)->withInput();
        } 
    	$role=Role::findOrFail($request->role_id);
    	$role->name=$request->name;
    	$role->save();
    	Session::flash('success','Role updated successfully');
    	return redirect()->back();
    }
    public function addRolePermissions(Request $request){

    	 $validator = Validator::make($request->all(), [
            'role_id' => 'required|integer',
            'permissions' => 'required',
        ]);
          if ($validator->fails()) {
            Session::flash('error','Please Provide Valid Details');                
            return Redirect::back()->withErrors($validator)->withInput();
        } 
    	$role=Role::findOrFail($request->role_id);
    	$role->givePermissionTo($request->permissions);
    	Session::flash('success','Permissions added successfully');
    	return redirect()->back();
    }
    public function viewPermissions(Request $request,$id){

    	$role=Role::findOrFail($id);
    	$permissions=$role->permissions()->get();
    	return view('admin.role.permissions',compact('permissions','role'));
    }
    public function deletePermission(Request $request,$id,$permission_id){

    	$role=Role::findOrFail($id);
    	$role->revokePermissionTo($permission_id);
    	Session::flash('success','Permissions deleted successfully');
    	return redirect()->back();

    }
}
