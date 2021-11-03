@extends('layouts.master')
@section('title')
Dashboard
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
                    <h3>Products</h3>
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
                        <table id="example1" class="table table-bordered table-hover table-responsive" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ProductName</th>
                                    <th>Unit</th>
                                    <th>ProductPrice</th>
                                    <th>ProductType</th>
                                    <th>ProductSize</th>
                                    <th>ProductUse</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                
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