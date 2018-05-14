@extends('layouts.admin.master')
@section('title', trans('admin.review.manager'))
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.review.manager')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.review.manager') </li>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> @lang('admin.id') </th>
                                        <th> @lang('admin.review.name') </th>
                                        <th> @lang('admin.review.rating') </th>
                                        <th> @lang('admin.review.content') </th>
                                        <th> @lang('admin.review.product') </th>
                                        <th> @lang('admin.created_at') </th>
                                        <th> @lang('admin.action') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->author }}</td>
                                        <td>
                                            @for($i = 0; $i < $review->rating; $i++)
                                                <span><i class="fa fa-star"></i></span>
                                            @endfor
                                        </td>
                                        <td>{{ $review->comment }}</td>
                                        <td>{{ $review->product->name }}</td>
                                        <td>{{ $review->created_at }}</td>
                                        <td>
                                            @if ($review->approved == \App\Models\Review::HIDDEN)
                                                {!! Form::open([
                                                    'route' => ['reviews.update', 'review' => $review->id],
                                                    'method' => 'PUT',
                                                ]) !!}
                                                    <button class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>
                                                        @lang('admin.review.approved')
                                                    </button>
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open([
                                                    'route' => ['reviews.update', 'review' => $review->id],
                                                    'method' => 'PUT',
                                                ]) !!}
                                                    <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                        @lang('admin.review.hidden')
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
@endsection
