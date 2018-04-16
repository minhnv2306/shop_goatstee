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
            <form method="get" class="searchform" id="search-product-form" action="#">
                <div>
                    <input type="text" class="textfield" name="s" id="s"
                           placeholder="Type the keyword to search &hellip;">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="header-cart">
            <span>
                <a class="cart-contents" href="#" title="View your shopping cart">
                    <span class="total">$ 150</span>
                    <i class="fa fa-shopping-cart"></i>
                    <span class="count">3</span>
                </a>
            </span>
        </div>
    </div><!-- .container -->
</header><!-- #masthead -->
<nav id="primary-navigation" class="primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <div class="container">
        <div class="menu-wrapper">
            <ul id="menu-primary-items" class="menu-primary-items">
                <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33">
                    <a href="{{ route('sites.about-us') }}">About Us</a>
                </li>
                <li id="menu-item-39" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-39">
                    <a href="#">Contact Us</a>
                </li>
                <li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38">
                    <a href="#">FAQs</a>
                </li>
                <li id="menu-item-377685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-377685">
                    <a href="#">Size Chart</a>
                </li>
            </ul>
        </div>
    </div><!-- .container -->
</nav><!-- #primary-navigation -->
