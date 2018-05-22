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
                            </div>
                            <div class="pull-right">
                                @can('create', 'App\Models\Role')
                                    <!-- Trigger the modal with a button -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-size">
                                        <i class="fa fa-plus"></i> Create new role
                                    </button>
                                    <!-- Modal -->
                                    <div id="create-size" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => 'roles.store'
                                            ]) !!}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"> @lang('admin.size.create') </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{ Form::label('name', trans('admin.category.name')) }}
                                                        {{ Form::text('name', '', [
                                                            'class' => 'form-control',
                                                            'id' => 'name',
                                                            'required' => '',
                                                        ]) }}
                                                    </div>
                                                    @foreach($objects as $key=>$value)
                                                        <div class="form-group">
                                                            <label class="title-role"> {{ $value }} </label>
                                                            <br>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" value="1" name="roles[{{$key}}][]" checked>View
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" value="2" name="roles[{{$key}}][]">Create
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" value="3" name="roles[{{$key}}][]">Update
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" value="4" name="roles[{{$key}}][]">Delete
                                                            </label>
                                                        </div>
                                                    @endforeach
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
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('update', 'App\Models\Role')
                                                <button class="btn btn-xs btn-primary" data-toggle="modal"
                                                        data-target="#edit-size-{{$role->id}}">
                                                    <i class="fa fa-edit"></i> @lang('admin.edit')
                                                </button>

                                                <!-- Modal -->
                                                <div id="edit-size-{{$role->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        {!! Form::open([
                                                            'method' => 'PUT',
                                                            'route' => ['roles.update', 'size' => $role->id],
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
                                                                    {{ Form::text('name', $role->name, [
                                                                        'class' => 'form-control',
                                                                        'id' => 'name',
                                                                        'required' => '',
                                                                    ]) }}
                                                                </div>
                                                                @foreach($objects as $key=>$value)
                                                                <div class="form-group">
                                                                    <label class="title-role"> {{ $value }} </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        @if(array_search(\App\Models\Role::VIEW, $role[$value]) === false)
                                                                            <input type="checkbox" value="1" name="roles[{{$key}}][]"> @lang('admin.roles.view')
                                                                        @else
                                                                            <input type="checkbox" value="1" checked name="roles[{{$key}}][]"> @lang('admin.roles.view')
                                                                        @endif
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        @if(array_search(\App\Models\Role::CREATE, $role[$value]) === false)
                                                                            <input type="checkbox" value="2" name="roles[{{$key}}][]"> @lang('admin.roles.create')
                                                                        @else
                                                                            <input type="checkbox" value="2" checked name="roles[{{$key}}][]"> @lang('admin.roles.create')
                                                                        @endif
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        @if(array_search(\App\Models\Role::UPDATE, $role[$value]) === false)
                                                                            <input type="checkbox" value="3" name="roles[{{$key}}][]"> @lang('admin.roles.update')
                                                                        @else
                                                                            <input type="checkbox" value="3" checked name="roles[{{$key}}][]"> @lang('admin.roles.update')
                                                                        @endif
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        @if(array_search(\App\Models\Role::DELETE, $role[$value]) === false)
                                                                            <input type="checkbox" value="4" name="roles[{{$key}}][]"> @lang('admin.roles.delete')
                                                                        @else
                                                                            <input type="checkbox" value="4" checked name="roles[{{$key}}][]"> @lang('admin.roles.delete')
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                                @endforeach
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
                                            @endcan
                                            @can('delete', 'App\Models\Role')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['sizes.destroy', 'size' => $role->id],
                                                    'class' => 'inline',
                                                ]) !!}
                                                <button class="btn btn-xs btn-danger deleteElement">
                                                    <i class="fa fa-trash"></i> @lang('admin.delete')
                                                </button>
                                                {!! Form::close() !!}
                                            @endcan
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
    {!! Html::style(asset('css/goatstee/role/index.css')) !!}
    <script>
        $('#roles').addClass('active');
    </script>
@endsection
