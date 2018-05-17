<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <div class="container">
        <div class="site-branding">
            <div id="logo" itemscope itemtype="http://schema.org/Brand">
                <a href="{{ route('sites.home') }}" itemprop="url" rel="home">
                    <img itemprop="logo" src="/img/logo.png" alt="Goatstee"/>
                </a>
            </div>
        </div>
        <div class="search-area">
            {!! Form::open([
                'method' => 'GET',
                'class' => 'searchform',
                'id' => 'search-product-form',
                'route' => 'sites.search',
            ]) !!}
                <div>
                    <input type="text" class="textfield search-input" name="s" id="s"
                           placeholder="Type the keyword to search &hellip;">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="header-cart">

        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modal-cart" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="border: none; padding-bottom: 0px">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="page-title" itemprop="headline">
                            @lang('sites.carts.cart') <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>
                        </h3>
                    </div>
                    <div class="modal-body" id="modal-my-cart" style="padding-top: 0px">

                    </div>
                </div>

            </div>
        </div>

    </div><!-- .container -->
</header><!-- #masthead -->
<nav id="primary-navigation" class="primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <div class="container">
        <div class="menu-wrapper">
            <ul id="menu-primary-items" class="menu-primary-items">
                <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33">
                    <a href="{{ route('sites.about-us') }}"> @lang('sites.about-us')</a>
                </li>
                @foreach($categories as $category)
                    <li id="menu-item-377685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-377685">
                        <a href="{{ route('categories-site.show', ['category' => $category->id]) }}"> {{ $category->name }} </a>
                    </li>
                @endforeach
                <li id="menu-item-39" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-39">
                    <a href="{{ route('sites.contact') }}"> @lang('sites.contact-us') </a>
                </li>
                <li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38">
                    <a href="{{ route('sites.faqs') }}"> @lang('sites.faqs') </a>
                </li>
                <li id="menu-item-377685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-377685">
                    <a href="{{ route('sites.size-chart') }}"> @lang('sites.size-chart') </a>
                </li>
            </ul>
        </div>
    </div><!-- .container -->
</nav><!-- #primary-navigation -->
