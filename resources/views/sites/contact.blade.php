@extends('layouts.sites.master')
@section('title', trans('sites.contact-us'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-34" class="post-34 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.contact-us')</h1>
                        <div class="entry-content" itemprop="text">
                            <p> @lang('sites.contact.address') <br/>
                                @lang('sites.contact.email'): <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                          data-cfemail="40333530302f323400272f2134333425256e232f2d">[email&#160;protected]</a><br/>
                                @lang('sites.contact.phone'): 2006283979</p>
                            <div role="form" class="wpcf7" id="wpcf7-f41-p34-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <form action="/contact-us/#wpcf7-f41-p34-o1" method="post" class="wpcf7-form"
                                      novalidate="novalidate">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="41"/>
                                        <input type="hidden" name="_wpcf7_version" value="4.7"/>
                                        <input type="hidden" name="_wpcf7_locale" value="en_US"/>
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f41-p34-o1"/>
                                        <input type="hidden" name="_wpnonce" value="f57b44ef66"/>
                                    </div>
                                    <p>
                                        <label> @lang('sites.contact.name')(required) <br/>
                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                       aria-required="true" aria-invalid="false"/></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label> @lang('sites.contact.email') (required) <br/>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                       aria-required="true" aria-invalid="false"/></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label> @lang('sites.contact.subject') <br/>
                                            <span class="wpcf7-form-control-wrap your-subject">
                                                <input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text"
                                                       aria-invalid="false"/></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label> @lang('sites.contact.message') <br/>
                                            <span class="wpcf7-form-control-wrap your-message">
                                                <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"
                                                        aria-invalid="false"></textarea>
                                            </span>
                                        </label>
                                    </p>
                                    <p><input type="submit" value="{{ trans('sites.contact.send') }}" class="wpcf7-form-control wpcf7-submit"/></p>
                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                </form>
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
