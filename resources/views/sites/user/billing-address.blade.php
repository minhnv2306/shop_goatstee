@extends('layouts.sites.master')
@section('title', trans('sites.billing-address'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-13" class="post-13 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.user.address') </h1>
                        <div class="entry-content" itemprop="text" style="width: 80%">
                            <div class="woocommerce">
                                @include('layouts.sites.components.user_dashboard')
                                <form method="POST" action="http://goatstee.herokuapp.com/users/save-billing-address"
                                      accept-charset="UTF-8" style="padding-bottom: 30px">
                                    <h3> @lang('sites.address.billing') </h3>
                                    @include('layouts.sites.components.address_infor')
                                    {!! Form::submit( trans('sites.user.save_address')) !!}
                                </form>
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
