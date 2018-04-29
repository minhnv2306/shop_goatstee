<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{ HTML::image(asset('img/avatar.png'), '', ['class' => 'img-circle', 'alt' => trans('admin.error_image')]) }}
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @lang('admin.online') </a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"> @lang('admin.main_nav') </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span> @lang('admin.dashboard') </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> @lang('admin.dashboard') </a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> @lang('admin.dashboard') </a></li>
                </ul>
            </li>
            <li id="users">
                <a href="{{ route('users-admin.index') }}">
                    <i class="fa fa-user"></i>
                    <span> @lang('admin.user.manager') </span>
                </a>
            </li>
            <li id="categories">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-circle-thin"></i>
                    <span> @lang('admin.category.manager') </span>
                </a>
            </li>
            <li id="products">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-product-hunt"></i>
                    <span> @lang('admin.product.manager') </span>
                </a>
            </li>
            <li id="orders">
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-money"></i>
                    <span> @lang('admin.order.manager') </span>
                </a>
            </li>
            <li id="reviews">
                <a href="{{ route('reviews.index') }}">
                    <i class="fa fa-star"></i>
                    <span> @lang('admin.review.manager') </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
