@extends('layouts.master')
@section('title')
Dashboard
@stop
<style type="text/css">
  .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
    background-color: #004d9d !important;
    border-color: #004d9d !important;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default {
    color: #fff !important;
}
.btn-default {
    background-color: #004d9d !important;
    color: #fff;
    border-color:  #004d9d !important;
}
.form-group
{
  margin-bottom: -8px !important;
}


</style>
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
                     <h3 style="display:inline-block;">Permissions For {{$role->name}}</h3>
                     <a href="#" title="" style="margin-top: 20px;margin-bottom: 10px;margin-right: 10px" class="btn btn-primary pull-right" data-toggle="modal" data-target="#productFilter">Add Permision</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                    @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                   @endif
                    @if(session()->has('error'))
                                <div class="alert alert-error">
                                    {{ session()->get('error') }}
                                </div>
                    @endif
                    </div>
                 </div>
            @if($permissions->isNotEmpty())
              <table id="example1" class="table table-bordered table-hover table-responsive" style="font-size: 14px">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key=>$permission)
                    <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                              <a href="/role/{{$role->id}}/permission/{{$permission->id}}/delete/">Delete</a>

                            </td>
                    </tr>
                    @endforeach
                </tbody>
                
                <tfoot>
                </tfoot>
              </table>
              @else
                  <h4>No Permissions Set to this User</h4>
              @endif
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

  <!---Modal Start -->
<div id="productFilter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add Permission</h4>
            </div>
            <div class="modal-body">
                <form action="/add/role/permissions" method="post" accept-charset="utf-8">
                    @csrf
                <input type="hidden" name="role_id" value="{{$role->id}}">
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="inputExperience" class="control-label">Permission Name</label>
                        <div>
                             <select multiple="multiple" class="form-control select2 js-example-tags input-border" style="width: 100%;" id="permission" name="permissions[]" placeholder="Select an Option"></select>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-success" id="filterProduct" style="margin-right: 50%">Submit</button>
            </div>
                </form>

            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal End -->

@stop
@section('script')
     <script>

    $(document).ready(function(){
          $(".alert").delay(3000).slideUp(300);

          $('#permission').select2({
              placeholder: 'Select an option',
              ajax: {
                url: "/get/permissions",
                data: function (params) {
                  var query = {
                    search: params.term
                  }
                  return query;
                },
                processResults: function (data) {
                  return {
                    results: data
                  };
                }
              }
          });
    });

    </script>

@stop

          