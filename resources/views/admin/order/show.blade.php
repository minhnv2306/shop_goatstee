@extends('layouts.admin.master')
@section('title', trans('admin.order.manager'))
@section('content')
    {!! Html::style(asset('css/goatstee/order_show.css')) !!}
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
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="row padding-bottom-40">
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.order.order') #1102</legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td> @lang('admin.order.date'): </td>
                                                                <td>Apr 26, 2017 12:00:00 AM</td>
                                                            </tr>
                                                            <tr>
                                                                <td> @lang('admin.order.status') </td>
                                                                <td>Pending</td>
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
                                                                <td>Nguyen Van Minh</td>
                                                            </tr>
                                                            <tr>
                                                                <td> @lang('admin.email'): </td>
                                                                <td>minhnv2306@gmail.com</td>
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
                                            <legend> @lang('admin.product.billing_addr') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td> @lang('admin.order.date'): </td>
                                                            <td>Apr 26, 2017 12:00:00 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td> @lang('admin.order.status') </td>
                                                            <td>Pending</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.product.shipping_addr') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td> @lang('admin.name'): </td>
                                                            <td>Nguyen Van Minh</td>
                                                        </tr>
                                                        <tr>
                                                            <td> @lang('admin.email'): </td>
                                                            <td>minhnv2306@gmail.com</td>
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
                                                            <tr>
                                                                <td>John</td>
                                                                <td>Doe</td>
                                                                <td>john@example.com</td>
                                                                <td>Doe</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mary</td>
                                                                <td>Moe</td>
                                                                <td>Doe</td>
                                                                <td>mary@example.com</td>
                                                            </tr>
                                                            <tr>
                                                                <td>July</td>
                                                                <td>Dooley</td>
                                                                <td>Doe</td>
                                                                <td>july@example.com</td>
                                                            </tr>
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
                                                    <div class="form-group">
                                                        {!! Form::label('status', trans('admin.product.made_in')) !!}
                                                        {!! Form::select('status', ['1' => 'Pending', '2' => 'Cancel'], '1', ['id' => 'status', 'class' => 'form-control']); !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('comment', trans('admin.product.comment')) !!}
                                                        {!! Form::textarea('comment', '', ['class' => 'form-control', 'rows' => '5', 'id' => 'comment']) !!}
                                                    </div>
                                                    {!! Form::submit(trans('admin.product.comment'), ['class' => 'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col col-xs-6">
                                        <fieldset>
                                            <legend> @lang('admin.product.total_price') </legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body text-right" style="background: #fcfac9">
                                                    <p> @lang('admin.order.order'): 100$</p>
                                                    <p> @lang('admin.order.coupon'): 50$</p>
                                                    <p> @lang('admin.order.price'): 50$</p>
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
