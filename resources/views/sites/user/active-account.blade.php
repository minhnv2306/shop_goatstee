@extends('layouts.sites.master')
@section('title', trans('sites.home'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <h1> Active account successfully! </h1>
                    <h2>
                        <a href="{{ route('sites.my-account') }}"> My account</a>
                    </h2>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
