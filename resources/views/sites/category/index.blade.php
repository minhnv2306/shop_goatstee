@extends('layouts.sites.master')
@section('title', 'Product')
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <aside id="shopy-products-2" class="widget widget-shopy-products">
                        <h3 class="widget-title">
                            <span> @lang('sites.all') </span>
                        </h3>
                        <div class="row" id="product-content">
                            @include('sites.category.ajax-get-product')
                        </div>
                    </aside>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var isAjax = 0;
        var height = 0;
        var count = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() >= (height + 50) && $(window).scrollTop() < (height + 200)) {
                var cateId = {!! $categoryId !!};
                if (isAjax == 0) {
                    isAjax = 1;
                    $.ajax({
                        url: '/getProducts/' + cateId + '/' + count,
                        type: 'GET',
                        success: function (data) {
                            $('#product-content').append(data);
                        }
                    })
                }
            } else if ($(window).scrollTop() > (height + 200)) {
                if (isAjax == 0) {
                    count = 1;
                } else {
                    count++;
                }
                height = height + 200;
                isAjax = 0;
            }
        });
    });
</script>
@endsection
