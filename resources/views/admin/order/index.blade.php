@extends('layouts.admin.master')
@section('title', trans('admin.order.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.order.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.order.manager') </li>
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
                            <table id="order-table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> @lang('admin.id') </th>
                                    <th> @lang('sites.order.billing-name') </th>
                                    <th> @lang('sites.order.billing-address') </th>
                                    <th> @lang('sites.order.shipping-name') </th>
                                    <th> @lang('sites.order.shipping-address') </th>
                                    <th> @lang('sites.carts.price') </th>
                                    <th> @lang('sites.order.status') </th>
                                    <th> @lang('admin.created_at') </th>
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
    {!! Html::script(asset('js/goatstee/order/index.js')) !!}
    <script>
        $('#order-table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, 'desc' ]],
            ajax: '{{route('datatable.order.server-side')}}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'billing_name', name: 'billing_name'},
                {data: 'billing_address', name: 'billing_address'},
                {data: 'shipping_name', name: 'shipping_name'},
                {data: 'shipping_address', name: 'shipping_address'},
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        } );
    </script>
@endsection
