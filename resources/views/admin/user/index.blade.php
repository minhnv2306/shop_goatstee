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
                            <div class="form-inline pull-left">
                            </div>
                            <div class="pull-right">
                            @can('create', 'App\Models\User')
                                <!-- Trigger the modal with a button -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-size">
                                        <i class="fa fa-plus"></i> @lang('admin.user.create')
                                    </button>
                                    <!-- Modal -->
                                    <div id="create-size" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => 'admin.users.store'
                                            ]) !!}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"> @lang('admin.size.create') </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{ Form::label('email', trans('admin.user.email')) }}
                                                        {{ Form::text('email', '', [
                                                            'class' => 'form-control',
                                                            'id' => 'email',
                                                            'required' => '',
                                                        ]) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('password', trans('admin.user.password')) }}
                                                        {{ Form::text('password', '', [
                                                            'class' => 'form-control',
                                                            'id' => 'password',
                                                            'required' => '',
                                                            'pattern' => ".{6,}"
                                                        ]) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('password_confirmation', trans('admin.user.confirm_password')) }}
                                                        {{ Form::text('password_confirmation', '', [
                                                            'class' => 'form-control',
                                                            'id' => 'password_confirmation',
                                                            'required' => '',
                                                            'pattern' => ".{6,}"
                                                        ]) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('role', trans('admin.user.role')) !!}
                                                        {!! Form::select('role_id', $roles->pluck('name', 'id')->toArray(), 2,
                                                            ['class' => 'form-control', 'id' => 'role_id'])
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
                                @endcan
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> @lang('admin.id') </th>
                                        <th> @lang('admin.email') </th>
                                        <th> @lang('admin.user.role') </th>
                                        <th> @lang('admin.created_at') </th>
                                        <th> @lang('admin.action') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role_id == 1)
                                                    <span class="label label-success"> {{ $user->role->name }} </span>
                                                @elseif ($user->role_id == 2)
                                                    <span class="label label-info"> {{ $user->role->name }} </span>
                                                @else
                                                    <span class="label label-warning"> {{ $user->role->name }} </span>
                                                @endif

                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                @can('update', 'App\Models\User')
                                                    @if (\Illuminate\Support\Facades\Auth::user()->id != $user->id)
                                                    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit-color-{{$user->id}}">
                                                        <i class="fa fa-edit"></i> @lang('admin.edit')
                                                    </button>

                                                    <!-- Modal -->
                                                    <div id="edit-color-{{$user->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            {!! Form::open([
                                                                'method' => 'PUT',
                                                                'route' => ['admin.users.update', 'user' => $user->id],
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
                                                                        {{ Form::label('email', trans('admin.user.email')) }}
                                                                        {{ Form::text('', $user->email, [
                                                                            'class' => 'form-control',
                                                                            'id' => 'email',
                                                                            'required' => '',
                                                                            'disabled' => '',
                                                                        ]) }}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        {!! Form::label('role', trans('admin.user.role')) !!}
                                                                        {!! Form::select('role_id', $roles->pluck('name', 'id')->toArray(), $user->role_id,
                                                                            ['class' => 'form-control', 'id' => 'role_id'])
                                                                        !!}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        {{ Form::submit(trans('admin.update'), ['class' => 'btn btn-primary']) }}
                                                                        {{ Form::submit(trans('admin.close'), [
                                                                            'class' => 'btn btn-default',
                                                                            'data-dismiss' => 'modal'
                                                                        ]) }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                    @endif
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
@endsection
@section('scripts')
    {!! Html::script(asset('js/goatstee/datatable.js')) !!}
    <script>
        $('#users').addClass('active');
    </script>
@endsection
