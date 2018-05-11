@extends('layouts.sites.master')
@section('title', 'Product')
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <aside id="shopy-products-2" class="widget widget-shopy-products">
                        <div class="shopy-sorting">
                            {!! Form::open([
                                'method' => 'GET',
                                'route' => ['categories-site.show', 'category_id' => $categoryId],
                                'id' => 'form-search',
                                'class' => 'woocommerce-ordering'
                            ]) !!}
                            <label for="orderby"> <h4> @lang('sites.product.sort') </h4></label>
                                {!! Form::select('orderby', $orderByArray, $orderBySelected, ['id' => 'orderby', 'style' => 'display:inline']) !!}
                            {!! Form::close() !!}
                        </div>

                        @include('sites.product.paginate')
                    </aside>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
@section('script')
    {!! Html::script(asset('js/goatstee/product/orderby.js')) !!}
@endsection
