@extends('layouts.admin.master')
@section('title', trans('admin.product.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.product.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.product.manager') </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('products.create') }}">
                                    <i class="fa fa-plus"></i> @lang('admin.product.create')
                                </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="product-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> @lang('admin.id') </th>
                                        <th> @lang('admin.name') </th>
                                        <th> @lang('admin.product.price') </th>
                                        <th> @lang('admin.product.image') </th>
                                        <th> @lang('admin.product.desciption') </th>
                                        <th> @lang('admin.category_title') </th>
                                        <th> @lang('admin.action') </th>
                                    </tr>
                                </thead>
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
    {!! Html::script(asset('js/goatstee/product/index.js')) !!}
    {!! Html::style(asset('css/goatstee/product/index.css')) !!}
    <script>
        $('#product-table').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '{{route('datatable.server-side')}}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'images', name: 'images'},
                {data: 'note', name: 'note'},
                {data: 'category_id', name: 'category_id'},
                {data: 'action', name: 'action'},
            ]
        } );
    </script>
@endsection
