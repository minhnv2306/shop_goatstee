@extends('layouts.admin.master')
@section('title', trans('admin.order.manager'))
@section('content')
    {!! Html::style(asset('css/goatstee/order_show.css')) !!}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('admin.order.order') . ' #'. $order->id }}
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
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="row padding-bottom-40">
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('sites.order.information') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td> @lang('admin.order.date'): </td>
                                                                <td> {{ $order->created_at }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td> @lang('admin.order.status') </td>
                                                                <td> {!! $status !!}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.order.customer') </legend>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td> @lang('admin.name'): </td>
                                                                <td> {{ $order->customer_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td> @lang('admin.email'): </td>
                                                                <td> {{ $order->customer_email }} </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row padding-bottom-40">
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('sites.order.billing_infor') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td> @lang('sites.order.billing-name'): </td>
                                                            <td> {{ $order->billing_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> @lang('sites.order.billing-address') </td>
                                                            <td> {{ $order->billing_address }} </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('sites.order.shipping_infor') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td> @lang('sites.order.shipping-name'): </td>
                                                            <td> {{ $order->shipping_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> @lang('sites.order.shipping-address'): </td>
                                                            <td> {{ $order->shipping_address }} </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row padding-bottom-40">
                                    <div class="col col-xs-12">
                                        <fieldset>
                                            <legend> @lang('admin.product.product') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> @lang('admin.name') </th>
                                                                <th> @lang('admin.product.price') </th>
                                                                <th> @lang('admin.product.number') </th>
                                                                <th> @lang('admin.product.total_price') </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($productOrders as $productOrder)
                                                            <tr>
                                                                <td> {{ $productOrder->storeProduct->product->name }} </td>
                                                                <td> {{ number_format($productOrder->storeProduct->product->price) }} </td>
                                                                <td> {{ number_format($productOrder->number) }} </td>
                                                                <td> {{ number_format($productOrder->price) }} </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.product.comment') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    {!! Form::open([
                                                        'method' => 'PUT',
                                                        'route' => ['orders.update', 'order' => $order->id]
                                                    ]) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('status', trans('admin.product.made_in')) !!}
                                                            {!! Form::select('status', $arrayStatus, $order->status, ['id' => 'status', 'class' => 'form-control']); !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('note', trans('admin.product.comment')) !!}
                                                            {!! Form::textarea('note', $order->note, ['class' => 'form-control', 'rows' => '5', 'id' => 'note']) !!}
                                                        </div>
                                                        {!! Form::submit(trans('admin.update'), ['class' => 'btn btn-primary']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.product.total_price') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body text-right" style="background: #fcfac9">
                                                    <p> @lang('admin.order.order'): {{ $price }} $</p>
                                                    <p> @lang('admin.order.coupon'): 0 $</p>
                                                    <p> @lang('admin.order.price'): {{ $price }} $</p>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
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
