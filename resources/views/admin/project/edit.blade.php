@extends('layouts.master')
@section('title')
Update Agent
@stop
@section('style')
@stop

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

 <section class="content">
    <div class="row">
      <div class="col-md-12">
          <!-- general form elements -->
          <div class="box-header">
            <h3> Update project</h3>
          </div>
          <div class="box box-primary">
            <!-- form start -->
            <form method='post' action='{{route('project.update',['project'=>$project->id])}}'>
                @csrf
                @method('put')
                   <div class="box-body" style="padding-left: 100px;">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                      <label for="name">Project Name :<sup class="required">*</sup></label>
                      <input type="text" name="name" value="{{$project->name }}" autocomplete="off" class="form-control" id="name" placeholder="Enter Name" required>
                       @if($errors->has('name'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('name')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                      <label for="phone">Project Status:<sup class="required">*</sup></label>
                       <select class="form-control" id="status" name="status" required>
                          <option value="In Progress" @if($project->status =="In Progress") selected @endif>In Progress</option>
                          <option value="Completed" @if($project->status =="Completed") selected @endif>Completed</option>
                        <option value="On Hold" @if($project->status =="On Hold") selected @endif>On Hold</option>
                    </select>
                      @if($errors->has('status'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('status')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="padding-left: 400px;">
                <button type="submit" class="btn btn-success" id="save"> Update</button>
              </div>
            </form>
            <!-- form end -->
          </div>
          
        </div>  
    </div><!-- /.row -->
</section>
    <!-- /.content -->
  </div>
@stop
