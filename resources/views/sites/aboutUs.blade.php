@extends('layouts.sites.master')
@section('title', trans('sites.about-us'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-19" class="post-19 page type-page status-publish hentry no-post-thumbnail entry"
                         itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.about-us') </h1>
                        <div class="entry-content" itemprop="text">
                            <p> @lang('sites.about.welcome') </p>
                            <p> @lang('sites.about.content_1') </p>
                            <p> @lang('sites.about.content_2') </p>
                            <p> @lang('sites.about.content_3') </p>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
