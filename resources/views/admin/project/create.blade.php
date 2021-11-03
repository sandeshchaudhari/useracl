@extends('layouts.master')
@section('title')
Create User
@stop
@section('style')
@stop

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Project
      </h1>
    </section>

 <section class="content">
    <div class="row">
      <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form method='post' action='{{route('project.store')}}'>
                @csrf
            </div>
              <div class="box-body" style="padding-left: 100px;">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                      <label for="name">Project Name :<sup class="required">*</sup></label>
                      <input type="text" name="name" value="{{ old('name') }}" autocomplete="off" class="form-control" id="name" placeholder="Enter Name" required>
                       @if($errors->has('name'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('name')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('role')) has-error @endif">
                      <label for="phone">Project Status:<sup class="required">*</sup></label>
                       <select class="form-control" id="status" name="status" required>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                            <option value="3">On Hold</option>
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
                <button type="submit" class="btn btn-success" id="save"> Submit</button>
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
