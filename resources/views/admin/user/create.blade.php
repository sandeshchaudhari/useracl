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
        Create User
      </h1>
    </section>

 <section class="content">
    <div class="row">
      <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form method='post' action='{{route('user.store')}}'>
                @csrf
            </div>
              <div class="box-body" style="padding-left: 100px;">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('firstname')) has-error @endif">
                      <label for="name">First Name :<sup class="required">*</sup></label>
                      <input type="text" name="firstname" value="{{ old('firstname') }}" autocomplete="off" class="form-control" id="firstname" placeholder="Enter Name" required>
                       @if($errors->has('firstname'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('firstname')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('lastname')) has-error @endif">
                      <label for="name">Last Name :<sup class="required">*</sup></label>
                      <input type="text" name="lastname" value="{{ old('lastname') }}" autocomplete="off" class="form-control" id="lastname" placeholder="Enter Name" required>
                        @if($errors->has('lastname'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('lastname')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                      <label for="email">Username :<sup class="required">*</sup></label>
                      <input type="text" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control" id="email" placeholder="Enter username" required>
                        @if($errors->has('email'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('email')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                      <label for="password">Password:<sup class="required">*</sup></label>
                      <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" placeholder="Enter Password" required>
                        @if($errors->has('password'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('password')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('phone_number')) has-error @endif">
                      <label for="phone">Phone No:<sup class="required">*</sup></label>
                      <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" id="phone_number" placeholder="Enter Phone Number" >
                        @if($errors->has('phone_number'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('phone_number')}}</span>
                       @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-8">
                    <div class="form-group @if($errors->has('role')) has-error @endif">
                      <label for="phone">User Role:<sup class="required">*</sup></label>
                       <select class="form-control" id="role" name="role" required>
                          @foreach($roles as $role)
                            <option value="{{$role->id}}"> {{$role->name}}</option>
                          @endforeach

                    </select>
                      @if($errors->has('role'))
                          <span id="helpBlock2" class="help-block">{{$errors->first('role')}}</span>
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
