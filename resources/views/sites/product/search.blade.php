@extends('layouts.sites.master')
@section('title', 'Product')
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <aside id="shopy-products-2" class="widget widget-shopy-products">
                        <nav class="woocommerce-breadcrumb"><a href="{{ route('sites.home') }}">@lang('sites.home')
                                / </a> @lang('sites.search.result')
                            &ldquo;{{ $key }}&rdquo;
                        </nav>
                        <h1 class="page-title"> @lang('sites.search.result'): &ldquo;{{ $key }}&rdquo;</h1>
                        <h1 class="page-title"> @lang('sites.search.number'): {{ $products->total() }}</h1>
                        <div class="shopy-sorting">
                            {!! Form::open([
                                'method' => 'GET',
                                'route' => 'sites.search',
                                'id' => 'form-search',
                                'class' => 'woocommerce-ordering'
                            ]) !!}
                                <label for="orderby"> <h4> @lang('sites.product.sort') </h4></label>
                                {!! Form::select('orderby', $orderByArray, $orderBySelected, ['id' => 'orderby']) !!}
                                <input type="hidden" name="s" value="{{ $key }}"/>
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
