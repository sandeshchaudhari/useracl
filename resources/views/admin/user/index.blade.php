@extends('layouts.master')
@section('title')
Users
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #DCDCDC;">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header" style="padding: 10px 0 2px 10px">
                     <h3>Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('includes.sessions')
              <table id="example1" class="table table-bordered table-hover table-responsive" style="font-size: 14px">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>UserName</th>
                  <th>PhoneNumber</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>View Permissions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                            <td>{{$key+1}}</td>
                             <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{implode(',', $user->getRoleNames()->toArray())}}</td>

                            <td>
                                <a href="{{route('user.edit',[$user->id])}}">Edit</a>
                            </td>
                            <td>
                                    <form method="POST" action="{{route('user.destroy',[$user->id])}}">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                    </form>
                            </td>
                            <td>
                              <a href="">View Permissions</a>
                            </td>
                           

                    </tr>
                    @endforeach
                  
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop
  @section('script')
     <script>

    $(document).ready(function(){
          $(".alert").delay(3000).slideUp(300);
    });

    </script>
            @stop