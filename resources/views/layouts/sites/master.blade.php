<!DOCTYPE html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">

@include('layouts.sites.components.header')

<body class="home page page-id-440 page-template page-template-page-templates page-template-home page-template-page-templateshome-php woocommerce-wishlist woocommerce woocommerce-page boxed header-style-four footer-style-one layout-1c"
      itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div id="page" class="hfeed site">
    <div class="wide-container">
        @include('layouts.sites.components.nav')
        @include('layouts.sites.components.header_body')
            @yield('content')
        @include('layouts.sites.components.footer')
    </div><!-- .wide-cotainer -->
</div><!-- #page -->

@include('layouts.sites.components.script')
    @yield('script')
</body>
</html>