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
                                @guest
                                    @include('layouts.sites.validation')
                                    <div class="u-columns col2-set" id="customer_login">
                                        <div class="u-column1 col-1 animation-left-to-right">
                                            <h2> @lang('sites.account.login') </h2>
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => 'login',
                                                'class' => 'login',
                                            ]) !!}
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="reg_email"> @lang('sites.account.username') <span class="required">*</span></label>
                                                {{ Form::email('email', old('email'), [
                                                    'class' => 'woocommerce-Input woocommerce-Input--text input-text',
                                                    'required' => '',
                                                    'id' => 'reg_email'
                                                ])}}
                                            </p>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="password"> @lang('sites.account.password') <span class="required">*</span></label>
                                                {{ Form::password('password', [
                                                    'class' => 'woocommerce-Input woocommerce-Input--text input-text',
                                                    'required' => '',
                                                    'id' => 'reg_password'
                                                ])}}
                                            </p>
                                            <p class="form-row">
                                                {{ Form::submit(trans('sites.account.login'), ['class' => 'woocommerce-Button button']) }}
                                                <label for="rememberme" class="inline">
                                                    {{ Form::checkbox('remember') }}
                                                    @lang('sites.account.remember')
                                                </label>
                                            </p>
                                            <p class="woocommerce-LostPassword lost_password">
                                                <a href="#"> @lang('sites.account.lost_password') </a>
                                            </p>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="u-column2 col-2 animation-right-to-left">
                                            <h2> @lang('sites.account.register') </h2>
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => 'register',
                                                'class' => 'register',
                                            ]) !!}
                                            {!! csrf_field() !!}
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="reg_email"> @lang('sites.user.email') <span class="required">*</span></label>
                                                {{ Form::email('email', old('email'), [
                                                    'class' => 'woocommerce-Input woocommerce-Input--text input-text',
                                                    'required' => '',
                                                    'id' => 'reg_email'
                                                ])}}
                                            </p>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="reg_password"> @lang('sites.account.password') <span class="required">*</span></label>
                                                {{ Form::password('password', [
                                                    'class' => 'woocommerce-Input woocommerce-Input--text input-text',
                                                    'required' => '',
                                                    'id' => 'reg_password'
                                                ])}}
                                            </p>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="confirm_pwd"> @lang('sites.account.confirm_password') <span class="required">*</span></label>
                                                {{ Form::password('password_confirmation', [
                                                    'class' => 'woocommerce-Input woocommerce-Input--text input-text',
                                                    'required' => '',
                                                    'id' => 'confirm_pwd'
                                                ])}}
                                            </p>
                                            <!-- Spam Trap -->
                                            <div style="left: -999em; position: absolute;">
                                                <label for="trap">Anti-spam</label>
                                                <input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" />
                                            </div>
                                            <p class="woocomerce-FormRow form-row">
                                                {{ Form::submit(trans('sites.account.register'), ['class' => 'woocommerce-Button button']) }}
                                            </p>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user()->active == 0)
                                        <h4> A active email just have been sent to you! Please active your account </h4>
                                    @else
                                        @include('layouts.sites.components.user_dashboard')
                                    @endif
                                @endguest
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
