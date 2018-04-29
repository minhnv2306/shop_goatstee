@extends('layouts.admin.master')
@section('title', trans('admin.size.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.size.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.size.manager') </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="form-inline pull-left">
                                {!! Form::label('made', trans('admin.category_title')) !!}
                                {!! Form::select('category_id', $categories->pluck('name', 'id')->toArray(), null,
                                    ['class' => 'form-control', 'id' => 'category_id'])
                                !!}
                                {!! Form::submit(trans('admin.filter'), ['class' => 'btn btn-primary', 'id' => 'filter']) !!}
                            </div>
                            <div class="pull-right">
                                <!-- Trigger the modal with a button -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#create-size">
                                    <i class="fa fa-plus"></i> @lang('admin.size.create')
                                </button>
                                <!-- Modal -->
                                <div id="create-size" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        {!! Form::open([
                                            'method' => 'POST',
                                            'route' => 'sizes.store'
                                        ]) !!}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title"> @lang('admin.size.create') </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="size_content">
                                                    <div class="form-group">
                                                        {{ Form::label('name', trans('admin.category.name')) }}
                                                        {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'required' => '',]) }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('made', trans('admin.category_title')) !!}
                                                    {!! Form::select('category_id', $categories->pluck('name', 'id')->toArray(), null,
                                                        ['class' => 'form-control'])
                                                    !!}
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
                                <!-- end Modal create -->
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
                                @foreach($sizes as $size)
                                    <tr>
                                        <td>{{ $size->id }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>
                                            <button class="btn btn-xs btn-primary" data-toggle="modal"
                                                    data-target="#edit-size-{{$size->id}}">
                                                <i class="fa fa-edit"></i> @lang('admin.edit')
                                            </button>

                                            <!-- Modal -->
                                            <div id="edit-size-{{$size->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    {!! Form::open([
                                                        'method' => 'PUT',
                                                        'route' => ['sizes.update', 'size' => $size->id],
                                                    ]) !!}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> @lang('admin.size.edit') </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                {{ Form::label('name', trans('admin.category.name')) }}
                                                                {{ Form::text('name', $size->name, [
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
                                            <!-- End modal -->
                                            @if($size->has('storeProducts')->get()->isEmpty())
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['sizes.destroy', 'size' => $size->id],
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
    {{ Form::hidden('', route('ajax.get-size', ['category_id' => 0]), ['id' => 'routeAjax']) }}
@endsection
@section('scripts')
    {!! Html::script(asset('js/goatstee/datatable.js')) !!}
    {!! Html::script(asset('js/goatstee/size/index.js')) !!}
@endsection
