@extends('layouts.admin.master')
@section('title', trans('admin.product.edit'))
@section('content')
    {!! Html::style(asset('css/goatstee/product/create.css')) !!}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> @lang('admin.product.edit') </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sites.home') </a></li>
                <li class="active"> @lang('admin.product.edit') </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <div class="container-fluid spark-screen">
                {!! Form::open([
                    'method' => 'PUT',
                    'route' => ['products.update', 'product' => $product->id],
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
                                        {!! Form::label('name', trans('admin.name')) !!} (*)
                                        {!! Form::text('name', $product->name, [ 'class' => 'form-control', 'id' => 'name', 'required' => '']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('price', trans('admin.product.price')) !!} (*)
                                        {!! Form::number('price', $product->price, [ 'class' => 'form-control', 'id' => 'price', 'min' => 1, 'required' => '']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('made_in', trans('admin.product.made_in')) !!}
                                        {!! Form::select('made_in', $types, $product->made_in, ['Domestic' => 'made_in', 'class' => 'form-control']); !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('category_id', trans('admin.category_title')) !!}
                                        {!! Form::select('category_id', $categories->pluck('name', 'id')->toArray(), $product->category_id,
                                            ['class' => 'form-control', 'id' => 'category_id', 'disabled' => 'true'])
                                        !!}
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
                                    <div id="product-content">
                                        @foreach($product->storeProducts as $storeProduct)
                                            <div class="form-inline padding-bottom-20">
                                                <div class="form-group">
                                                    {!! Form::label('color', trans('sites.product.color')) !!}
                                                    {!! Form::select('colors[]', $colors->pluck('name', 'id')->toArray(), $storeProduct->color_id,
                                                        ['class' => 'form-control', 'id' => 'color'])
                                                    !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('size_add', trans('sites.product.size')) !!}
                                                    {!! Form::select('sizes[]', $sizes->pluck('name', 'id')->toArray(), $storeProduct->size_id,
                                                        ['class' => 'form-control', 'id' => 'color'])
                                                    !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('sex_add', trans('admin.product.sex')) !!}
                                                    {!! Form::select('sex[]', ['Men' => 'Men', 'Woman' => 'Woman'], $storeProduct->sex, ['id' => 'made', 'class' => 'form-control']); !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('number', trans('admin.number')) !!}
                                                    {!! Form::number('numbers[]', $storeProduct->number, [ 'class' => 'form-control width-100', 'id' => 'number', 'required' => '', 'min' => 1]) !!}
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-danger delete-product"><i class="fa fa-trash"></i></button>
                                                </div>
                                                <input type="hidden" value="{{ $storeProduct->id }}" name="store_ids[]">
                                            </div>
                                        @endforeach
                                        {!! Html::script(asset('js/goatstee/product/delete-product-detail.js')) !!}
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
                                        {!! Form::label('washing', trans('admin.product.note_machine')) !!}
                                        {!! Form::textarea('washing', $product->washing, ['class' => 'form-control', 'rows' => '5', 'id' => 'washing']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('note_1', trans('admin.product.note_1')) !!}
                                        {!! Form::textarea('note_1', $product->note_1, ['class' => 'form-control', 'rows' => '5', 'id' => 'note_1']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('note_2', trans('admin.product.note_2')) !!}
                                        {!! Form::textarea('note_2', $product->note_2, ['class' => 'form-control', 'rows' => '5', 'id' => 'note_2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('note_3', trans('admin.product.note_3')) !!}
                                        {!! Form::textarea('note_3', $product->note_2, ['class' => 'form-control', 'rows' => '5', 'id' => 'note_3']) !!}
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
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('avatar', trans('admin.product.avatar')) !!} (*)
                                            {!! Form::file('avatar', ['onchange' => 'preview_image_1(event)', 'id' => 'avatar']) !!}
                                            <br/>
                                            <img src="{{ $avatar[0]->link }}" class="width-full">
                                            <input type="hidden" name="avatar_image_id" value="{{ $avatar[0]->id }}">
                                            <br/>
                                            <img id="output_image_1" class="width-full"/>
                                        </div>
                                    </div>
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('image_1', trans('admin.product.image_1')) !!}
                                            {!! Form::file('image_1', ['onchange' => 'preview_image_2(event)', 'id' => 'image_1']) !!}
                                            <br/>
                                            @if(count($images) > 0)
                                                <img src="{{ $images[0]->link }}" class="width-full">
                                                <input type="hidden" name="image_1_id" value="{{ $images[0]->id }}">
                                                <br/>
                                            @endif
                                            <img id="output_image_2" class="width-full"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('image_2', trans('admin.product.image_2')) !!}
                                            {!! Form::file('image_2', ['onchange' => 'preview_image_3(event)', 'id' => 'image_2']) !!}
                                            <br/>
                                            @if(count($images) > 1)
                                                <img src="{{ $images[1]->link }}" class="width-full">
                                                <input type="hidden" name="image_2_id" value="{{$images[1]->id}}">
                                                <br/>
                                            @endif
                                            <img id="output_image_3" class="width-full"/>
                                        </div>
                                    </div>
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('image_3', trans('admin.product.image_3')) !!}
                                            {!! Form::file('image_3', ['onchange' => 'preview_image_4(event)', 'id' => 'image_3']) !!}
                                            <br/>
                                            @if(count($images) > 2)
                                                <img src="{{ $images[2]->link }}" class="width-full">
                                                <input type="hidden" name="image_3_id" value="{{$images[2]->id}}">
                                                <br/>
                                            @endif
                                            <img id="output_image_4" class="width-full"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('image_4', trans('admin.product.image_4')) !!}
                                            {!! Form::file('image_4', ['onchange' => 'preview_image_5(event)', 'id' => 'image_4']) !!}
                                            <br/>
                                            @if(count($images) > 3)
                                                <img src="{{ $images[3]->link }}" class="width-full">
                                                <input type="hidden" name="image_4_id" value="{{$images[3]->id}}">
                                                <br/>
                                            @endif
                                            <img id="output_image_5" class="width-full"/>
                                        </div>
                                    </div>
                                    <div class="col col-xs-6">
                                        <div class="form-group">
                                            {!! Form::label('image_5', trans('admin.product.image_5')) !!}
                                            {!! Form::file('image_5', ['onchange' => 'preview_image_6(event)', 'id' => 'image_5']) !!}
                                            <br/>
                                            @if(count($images) > 4)
                                                <img src="{{ $images[4]->link }}" class="width-full">
                                                <input type="hidden" name="image_5_id" value="{{$images[4]->id}}">
                                                <br/>
                                            @endif
                                            <img id="output_image_6" class="width-full"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--table-responsive-->

                    </div>
                </div>
                {!! Form::submit(trans('admin.update'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
@section('scripts')
    {!! Html::script(asset('js/goatstee/product/create.js')) !!}
    {!! Html::script(asset('js/goatstee/product/index.js')) !!}
@endsection
