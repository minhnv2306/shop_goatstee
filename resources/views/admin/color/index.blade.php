@extends('layouts.admin.master')
@section('title', trans('admin.color.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.color.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.color.manager') </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-right">
                                @can('create', 'App\Models\Color')
                                    <!-- Trigger the modal with a button -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-color">
                                        <i class="fa fa-plus"></i> @lang('admin.color.create')
                                    </button>
                                    <!-- Modal -->
                                    <div id="create-color" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => 'colors.store'
                                            ]) !!}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title"> @lang('admin.color.create') </h4>
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
                                    <!-- end Modal create -->
                                @endcan
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
                                @foreach($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>
                                            @can('update', 'App\Models\Color')
                                                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit-color-{{$color->id}}">
                                                    <i class="fa fa-edit"></i> @lang('admin.edit')
                                                </button>

                                                <!-- Modal -->
                                                <div id="edit-color-{{$color->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        {!! Form::open([
                                                            'method' => 'PUT',
                                                            'route' => ['colors.update', 'color' => $color->id],
                                                        ]) !!}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    &times;
                                                                </button>
                                                                <h4 class="modal-title"> @lang('admin.category.create') </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    {{ Form::label('name', trans('admin.category.name')) }}
                                                                    {{ Form::text('name', $color->name, [
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
                                            @endcan
                                            <!-- End modal -->
                                            @if($color->has('storeProducts')->get()->isEmpty())
                                                @can('delete', 'App\Models\Color')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['colors.destroy', 'color' => $color->id],
                                                        'class' => 'inline',
                                                    ]) !!}
                                                    <button class="btn btn-xs btn-danger deleteElement">
                                                        <i class="fa fa-trash"></i> @lang('admin.delete')
                                                    </button>
                                                    {!! Form::close() !!}
                                                @endcan
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
    {!! Html::script(asset('js/goatstee/color/index.js')) !!}
@endsection
