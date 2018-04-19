@extends('layouts.sites.master')
@section('title', trans('sites.my-account'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-13" class="post-13 page type-page status-publish hentry no-post-thumbnail entry" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.my-account') </h1>
                        <div class="entry-content" itemprop="text">
                            <div class="woocommerce">
                                <div class="u-columns col2-set" id="customer_login">
                                    <div class="u-column1 col-1">
                                        <h2> @lang('sites.account.login') </h2>
                                        <form method="post" class="login">
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="username"> @lang('sites.account.username') <span class="required">*</span></label>
                                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="" />
                                            </p>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="password"> @lang('sites.account.password') <span class="required">*</span></label>
                                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                                            </p>
                                            <p class="form-row">
                                                <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="703e8dca97" /><input type="hidden" name="_wp_http_referer" value="/my-account/" />
                                                <input type="submit" class="woocommerce-Button button" name="login" value="{{ trans('sites.account.login') }}" />
                                                <label for="rememberme" class="inline">
                                                    <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                                                </label>
                                            </p>
                                            <p class="woocommerce-LostPassword lost_password">
                                                <a href="https://goatstee.com/my-account/lost-password/"> @lang('sites.account.lost_password') </a>
                                            </p>
                                        </form>
                                    </div>
                                    <div class="u-column2 col-2">
                                        <h2> @lang('sites.account.register') </h2>
                                        <form method="post" class="register">
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="reg_email"> @lang('sites.user.email') <span class="required">*</span></label>
                                                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="" />
                                            </p>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="reg_password"> @lang('sites.account.password') <span class="required">*</span></label>
                                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
                                            </p>
                                            <!-- Spam Trap -->
                                            <div style="left: -999em; position: absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>
                                            <p class="woocomerce-FormRow form-row">
                                                <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="496866d02f" /><input type="hidden" name="_wp_http_referer" value="/my-account/" />
                                                <input type="submit" class="woocommerce-Button button" name="register" value="{{ trans('sites.account.register') }}" />
                                            </p>
                                        </form>
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
