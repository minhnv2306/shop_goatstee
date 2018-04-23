@extends('layouts.admin.master')
@section('title', trans('admin.user.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.user.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.user.manager') </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> @lang('admin.id') </th>
                                        <th> @lang('admin.name') </th>
                                        <th> @lang('admin.email') </th>
                                        <th> @lang('admin.created_at') </th>
                                        <th> @lang('admin.action') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Minh NV</td>
                                        <td>minhnv2306@gmail.com</td>
                                        <td>21/3/1234</td>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit') </a>
                                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> @lang('admin.delete') </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
                                    </tr>
                                </tbody>
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
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    {!! Html::script(asset('js/goatstee/datatable.js')) !!}
@endsection
