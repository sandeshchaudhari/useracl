<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::get();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'firstname' => 'required|string',
           'lastname' => 'required|string',
           'email' => 'required|email|unique:users',
           // 'password' => [
           //                     'required',
           //                     'string',
           //                     'min:6',             // must be at least 10 characters in length
           //                     'regex:/[a-z]/',      // must contain at least one lowercase letter
           //                     'regex:/[A-Z]/',      // must contain at least one uppercase letter
           //                     'regex:/[0-9]/',      // must contain at least one digit
           //                     'regex:/[@$!%*#?&]/', // must contain a special character
           //                 ],
           'phone_number' => 'nullable||min:11|numeric',

       ]);
         if ($validator->fails()) {
           Session::flash('error','Please Provide Valid Details');                
           return Redirect::back()->withErrors($validator)->withInput();
       } 
       $user=User::create([

           'firstname'=>$request->firstname.' '.$request->lastname,
           'lastname'=>$request->lastname,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           'phone_number'=>$request->phone_number,
       ]);
       $role=Role::findOrFail($request->role);
       $user->syncRoles($role);
       Session::flash('success','user created successfully');
       return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::get();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->where('id',$id)->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone_number'=>$request->phone_number,
        ]);
        $role=Role::findOrFail($request->role);
        $user->syncRoles($role);
        Session::flash('success','User Updated Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('success','user Deleted Successfully');
        return redirect()->back();
    }
}
