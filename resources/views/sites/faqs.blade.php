@extends('layouts.sites.master')
@section('title', trans('sites.faqs'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-36" class="post-36 page type-page status-publish hentry no-post-thumbnail entry" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

                        <h1 class="page-title" itemprop="headline"> @lang('faqs.faqs') </h1>
                        <div class="entry-content" itemprop="text">
                            <p><strong> @lang('faqs.content_1') <br />
                                </strong></p>
                            <p> @lang('faqs.question_1') </p>
                            <p> @lang('faqs.answer_1') </p>
                            <p><strong> @lang('faqs.content_2') <br />
                                </strong></p>
                            <p> @lang('faqs.question_2') </p>
                            <p> @lang('faqs.answer_2') </p>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
