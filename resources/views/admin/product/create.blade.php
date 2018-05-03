@extends('layouts.admin.master')
@section('title', trans('admin.product.create'))
@section('content')
    {!! Html::style(asset('css/goatstee/product/create.css')) !!}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> @lang('admin.product.create') </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.product.create') </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <div class="container-fluid spark-screen">
                {!! Form::open([
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="row">

                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            {!! Form::label('name', trans('admin.name')) !!}
                                            {!! Form::text('name', '', [ 'class' => 'form-control', 'id' => 'name', ]) !!}
                                        </div>

                                        <div class="form-inline" style="width: 20%">
                                            {!! Form::label('price', trans('admin.product.price')) !!}
                                            {!! Form::number('pirce', '', [ 'class' => 'form-control', 'id' => 'price', 'min' => 0]) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('made', trans('admin.product.made_in')) !!}
                                            {!! Form::select('made', ['VN' => 'Vietnam', 'S' => 'China'], 'VN', ['id' => 'made', 'class' => 'form-control']); !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('category', trans('admin.category')) !!}
                                            {!! Form::select('category', ['VN' => 'Vietnam', 'S' => 'China'], 'VN', ['id' => 'made', 'class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div><!--table-responsive-->

                            </div>
                        </div>
                        <!-- /.box -->

                        <div class="col-xs-6">

                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="row">

                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            {!! Form::label('color_add', trans('admin.add_detail') . ':') !!}
                                            {!! Form::submit(trans('admin.add'), ['class' => 'btn btn-primary', 'id' => 'add_detail']) !!}
                                            <br/>
                                        </div>
                                        <div class="form-inline padding-bottom-20">
                                            <div class="form-group">
                                                {!! Form::label('color_add', trans('sites.product.color')) !!}
                                                {!! Form::select('color_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('size_add', trans('sites.product.size')) !!}
                                                {!! Form::select('size_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('sex_add', trans('admin.product.sex')) !!}
                                                {!! Form::select('sex_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('name', 'Number') !!}
                                                {!! Form::text('name', '', [ 'class' => 'form-control width-100', 'id' => 'name', ]) !!}
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-inline padding-bottom-20">
                                            <div class="form-group">
                                                {!! Form::label('color_add', trans('sites.product.color')) !!}
                                                {!! Form::select('color_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('size_add', trans('sites.product.size')) !!}
                                                {!! Form::select('size_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('sex_add', trans('admin.product.sex')) !!}
                                                {!! Form::select('sex_add', ['R' => 'Red', 'B' => 'Black'], 'R', ['id' => 'made', 'class' => 'form-control']); !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('name', trans('admin.number')) !!}
                                                {!! Form::text('name', '', [ 'class' => 'form-control width-100', 'id' => 'name', ]) !!}
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--table-responsive-->

                        </div>
                    </div>
                    <!-- /.box -->

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="row">

                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            {!! Form::label('note_machine', trans('admin.product.note_machine')) !!}
                                            {!! Form::textarea('note_machine', '', ['class' => 'form-control', 'rows' => '5', 'id' => 'note_machine']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('note_1', trans('admin.product.note_1')) !!}
                                            {!! Form::textarea('note_1', '', ['class' => 'form-control', 'rows' => '5', 'id' => 'note_1']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('note_2', trans('admin.product.note_2')) !!}
                                            {!! Form::textarea('note_2', '', ['class' => 'form-control', 'rows' => '5', 'id' => 'note_2']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('note_3', trans('admin.product.note_3')) !!}
                                            {!! Form::textarea('note_3', '', ['class' => 'form-control', 'rows' => '5', 'id' => 'note_3']) !!}
                                        </div>
                                    </div>
                                </div><!--table-responsive-->

                            </div>
                        </div>
                        <!-- /.box -->

                        <div class="col-xs-6">

                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="row">

                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="sel1"> @lang('admin.product.size_man'):</label>
                                        <br/>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Black" checked> Black
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Navy" checked> Navy
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Slate" > Slate
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Asphalt" checked> Asphalt
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Silver" > Silver
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Red" > Red
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Cranberry" > Cranberry
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="White" > White
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Royal Blue" > Royal Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Brown" > Brown
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Olive" > Olive
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Baby Blue" > Baby Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Lemon" > Lemon
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Pink" > Pink
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Kelly Green" > Kelly Green
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather Grey" > Heather Grey
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather Blue" > Heather Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Dark Heather" > Dark Heather
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Orange" > Orange
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather" > Heather
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1"> @lang('admin.product.size_woman'):</label>
                                        <br/>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Black" checked> Black
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Navy" checked> Navy
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Slate" > Slate
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Asphalt" checked> Asphalt
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Silver" > Silver
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Red" > Red
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Cranberry" > Cranberry
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="White" > White
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Royal Blue" > Royal Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Brown" > Brown
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Olive" > Olive
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Baby Blue" > Baby Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Lemon" > Lemon
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Pink" > Pink
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Kelly Green" > Kelly Green
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather Grey" > Heather Grey
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather Blue" > Heather Blue
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Dark Heather" > Dark Heather
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Orange" > Orange
                                        </label>
                                        <label class="checkbox-inline color">
                                            <input type="checkbox" name="colors_men[]" value="Heather" > Heather
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('avatar', trans('admin.product.avatar')) !!}
                                                {!! Form::file('avatar', ['onchange' => 'preview_image_1(event)', 'id' => 'avatar']) !!}
                                                <br/>
                                                <img id="output_image_1" width="100%"/>
                                            </div>
                                        </div>
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('image_1', trans('admin.product.image_1')) !!}
                                                {!! Form::file('image_1', ['onchange' => 'preview_image_2(event)', 'id' => 'image_1']) !!}
                                                <br/>
                                                <img id="output_image_2" width="100%"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('image_2', trans('admin.product.image_2')) !!}
                                                {!! Form::file('image_2', ['onchange' => 'preview_image_3(event)', 'id' => 'image_2']) !!}
                                                <br/>
                                                <img id="output_image_3" width="100%"/>
                                            </div>
                                        </div>
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('image_3', trans('admin.product.image_3')) !!}
                                                {!! Form::file('image_3', ['onchange' => 'preview_image_4(event)', 'id' => 'image_3']) !!}
                                                <br/>
                                                <img id="output_image_4" width="100%"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('image_4', trans('admin.product.image_4')) !!}
                                                {!! Form::file('image_4', ['onchange' => 'preview_image_5(event)', 'id' => 'image_4']) !!}
                                                <br/>
                                                <img id="output_image_5" width="100%"/>
                                            </div>
                                        </div>
                                        <div class="col col-xs-6">
                                            <div class="form-group">
                                                {!! Form::label('image_5', trans('admin.product.image_5')) !!}
                                                {!! Form::file('image_5', ['onchange' => 'preview_image_6(event)', 'id' => 'image_5']) !!}
                                                <br/>
                                                <img id="output_image_6" width="100%"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--table-responsive-->

                        </div>
                    </div>
                    {!! Form::submit(trans('admin.product.create'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
@section('scripts')
    {!! Html::script(asset('js/goatstee/product/create.js')) !!}
@endsection
