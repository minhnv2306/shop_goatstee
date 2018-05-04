<div class="form-inline padding-bottom-20">
    <div class="form-group">
        {!! Form::label('color', trans('sites.product.color')) !!}
        {!! Form::select('colors[]', $colors->pluck('name', 'id')->toArray(), null,
            ['class' => 'form-control', 'id' => 'color'])
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('size_add', trans('sites.product.size')) !!}
        {!! Form::select('sizes[]', $sizes->pluck('name', 'id')->toArray(), null,
            ['class' => 'form-control', 'id' => 'color'])
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('sex_add', trans('admin.product.sex')) !!}
        {!! Form::select('sex[]', ['Men' => 'Men', 'Woman' => 'Woman'], 'Men', ['id' => 'made', 'class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('number', trans('admin.number')) !!}
        {!! Form::number('numbers[]', 1, [ 'class' => 'form-control width-100', 'id' => 'number', 'required' => '', 'min' => 1]) !!}
    </div>
    <div class="form-group">
        <button class="btn btn-danger delete-product"><i class="fa fa-trash"></i></button>
    </div>
</div>
{!! Html::script(asset('js/goatstee/product/delete-product-detail.js')) !!}
