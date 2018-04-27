@extends('layouts.sites.master')
@section('title', trans('sites.address.account_detail'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-13" class="post-13 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.my-account') </h1>
                        <div class="entry-content" itemprop="text" style="width: 80%">
                            <div class="woocommerce">
                                @include('layouts.sites.validation')
                                @include('layouts.sites.components.user_dashboard')

                                {!! Form::open([
                                    'method' => 'PUT',
                                    'route' => ['users.update', 'user' => Auth::user()->id],
                                    'class' => 'padding-bottom-40',
                                ]) !!}
                                    <h3> @lang('sites.address.account_detail') </h3>
                                    @include('layouts.sites.components.address_infor')
                                    {!! Form::submit( trans('sites.user.save_address')) !!}
                                {!! Form::close() !!}
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
