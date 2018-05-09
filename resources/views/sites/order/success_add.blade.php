@extends('layouts.sites.master')
@section('title', trans('sites.checkout'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-12" class="post-12 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline">@lang('sites.order.order')</h1>
                        <div class="entry-content" itemprop="text">
                            @if (!empty($message))
                                <div class="woocommerce">
                                    <div class="woocommerce-info"> {{ $message }}
                                        <a href="{{ route('sites.my-order') }}"> @lang('sites.order.order') </a>
                                    </div>
                                </div>
                            @else
                                <div class="woocommerce">
                                    <div class="alert alert-danger"> {{ $error }}
                                        <a href="{{ route('sites.cart') }}"> @lang('sites.carts.your_cart') </a>
                                    </div>
                                </div>
                            @endif
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
