<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::get();
        return view('admin.project.index',compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');

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
            'name' => 'required|string',
            'status' => 'required',
        ]);
          if ($validator->fails()) {
            Session::flash('error','Please Provide Valid Details');                
            return Redirect::back()->withErrors($validator)->withInput();
        } 
        $user=Project::create([
 
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        Session::flash('success','Project created successfully');
        return redirect()->route('project.index');
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
        $project=Project::find($id);
        return view('admin.project.edit',compact('project'));
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
        $project=Project::findOrFail($id);
        $project->where('id',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        Session::flash('success','project Updated Successfully');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        Session::flash('success','Project Deleted Successfully');
        return redirect()->back();
    }

    public function changeProjectStatus(Request $request){

        Project::where('id',$request->project_id)->update([

            'status'=>$request->status,
        ]);
        Session::flash('success','Project Status Successfully');
        return redirect()->back();
    }
}
