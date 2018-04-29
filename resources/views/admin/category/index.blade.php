@extends('layouts.admin.master')
@section('title', trans('admin.category.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.category.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.category.manager') </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-right">
                                <!-- Trigger the modal with a button -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#create-cate">
                                    <i class="fa fa-plus"></i> @lang('admin.category.create')
                                </button>
                                <!-- Modal -->
                                <div id="create-cate" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        {!! Form::open([
                                            'method' => 'POST',
                                            'route' => 'categories.store'
                                        ]) !!}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title"> @lang('admin.category.create') </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{ Form::label('name', trans('admin.category.name')) }}
                                                    {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'required' => '',]) }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{ Form::submit(trans('admin.create'), ['class' => 'btn btn-primary']) }}
                                                {{ Form::submit(trans('admin.close'), [
                                                    'class' => 'btn btn-default',
                                                    'data-dismiss' => 'modal',
                                                ]) }}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> @lang('admin.id') </th>
                                    <th> @lang('admin.name') </th>
                                    <th> @lang('admin.action') </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $cate)
                                    <tr>
                                        <td>{{ $cate->id }}</td>
                                        <td>{{ $cate->name }}</td>
                                        <td>
                                            <button href="#" class="btn btn-xs btn-primary" data-toggle="modal"
                                                    data-target="#edit-cate-{{$cate->id}}">
                                                <i class="fa fa-edit"></i> @lang('admin.edit')
                                            </button>

                                            <!-- Modal -->
                                            <div id="edit-cate-{{$cate->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    {!! Form::open([
                                                        'method' => 'PUT',
                                                        'route' => ['categories.update', 'category' => $cate->id],
                                                    ]) !!}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"> @lang('admin.category.create') </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{ Form::label('name', trans('admin.category.name')) }}
                                                                {{ Form::text('name', $cate->name, [
                                                                    'class' => 'form-control',
                                                                    'id' => 'name',
                                                                    'required' => '',
                                                                ]) }}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {{ Form::submit(trans('admin.update'), ['class' => 'btn btn-primary']) }}
                                                            {{ Form::submit(trans('admin.close'), [
                                                                'class' => 'btn btn-default',
                                                                'data-dismiss' => 'modal'
                                                            ]) }}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                            @if($cate->has('products')->get()->isEmpty())
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['categories.destroy', 'category' => $cate->id],
                                                    'class' => 'inline',
                                                ]) !!}
                                                <button class="btn btn-xs btn-danger deleteElement">
                                                    <i class="fa fa-trash"></i> @lang('admin.delete')
                                                </button>
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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
    {!! Html::script(asset('js/goatstee/cate/index.js')) !!}
@endsection
