@extends('layouts.sites.master')
@section('title', trans('sites.user.address'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-13" class="post-13 page type-page status-publish hentry no-post-thumbnail entry" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.user.address') </h1>
                        <div class="entry-content" itemprop="text">
                            <div class="woocommerce">
                                @include('layouts.sites.components.user_dashboard')
                                <div class="woocommerce-MyAccount-content">
                                    <p> @lang('sites.address.note') </p>
                                    <div class="u-columns woocommerce-Addresses col2-set addresses">
                                        <div class="u-column1 col-1 woocommerce-Address">
                                            <header class="woocommerce-Address-title title">
                                                <h3> @lang('sites.address.billing') </h3>
                                                <a href="http://goatstee.herokuapp.com/users/create-billing-address" class="edit"> @lang('sites.address.edit')</a>
                                            </header>
                                            <address>
                                                @lang('sites.address.no_address')
                                            </address>
                                        </div>
                                        <div class="u-column2 col-2 woocommerce-Address">
                                            <header class="woocommerce-Address-title title">
                                                <h3> @lang('sites.address.shipping') </h3>
                                                <a href="http://goatstee.herokuapp.com/users/create-shipping-address" class="edit"> @lang('sites.address.edit') </a>
                                            </header>
                                            <address>
                                                @lang('sites.address.no_address')
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
