@extends('layouts.master')
@section('title')
Projects
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
                     <h3>Projects</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('includes.sessions')
              <table id="example1" class="table table-bordered table-hover table-responsive" style="font-size: 14px">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Change Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key=>$project)
                    <tr>
                            <td>{{$key+1}}</td>
                             <td>{{$project->name}}</td>
                             <td>{{$project->status}}</td>
                              <td>
                                <a href="#" onclick="changeStatus('{{ $project->id }}', '{{ $project->status }}')">Change Status</a>
                            </td>
                            <td>
                                <a href="{{route('project.edit',[$project->id])}}">Edit</a>
                            </td>
                            <td>
                                    <form method="POST" action="{{route('project.destroy',[$project->id])}}">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                    </form>
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

  <!---Modal Start -->
<div id="changeStatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Change Status</h4>
            </div>
            <div class="modal-body">
                <form action="/change/project/status" method="post" accept-charset="utf-8">
                  <input type="hidden" name="project_id" value="" id="projectId">
                    @csrf
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="phone">Project Status:<sup class="required">*</sup></label>
                       <select class="form-control" id="status" name="status" required>
                          <option value="In Progress">In Progress</option>
                          <option value="Completed" >Completed</option>
                        <option value="On Hold">On Hold</option>
                    </select>
                    </div>
                    
                  </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-success" id="project" style="margin-right: 50%">Submit</button>
            </div>
                </form>

            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal End -->
@stop
  @section('script')
     <script>

     function changeStatus(id,name){
        $("#changeStatus").modal('show');
        $("#projectId").val(id);
        $("#roleId").val(id);
      }
    $(document).ready(function(){
          $(".alert").delay(3000).slideUp(300);
    });

    </script>
            @stop