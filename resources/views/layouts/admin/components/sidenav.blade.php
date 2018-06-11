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
                <p> {{ Auth::user()->email }}</p>
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
            @can('users.view')
            <li id="users">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span> @lang('admin.user.manager') </span>
                </a>
            </li>
            @endcan
            @can('roles.view')
            <li id="roles">
                <a href="{{ route('roles.index') }}">
                    <i class="fa fa fa-exchange"></i>
                    <span> Role Manager </span>
                </a>
            </li>
            @endcan
            @can('categories.view')
            <li id="categories">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-circle-thin"></i>
                    <span> @lang('admin.category.manager') </span>
                </a>
            </li>
            @endcan
            @can('colors.view')
            <li id="colors">
                <a href="{{ route('colors.index') }}">
                    <i class="fa fa-cube"></i>
                    <span> @lang('admin.color.manager') </span>
                </a>
            </li>
            @endcan
            @can('sizes.view')
            <li id="sizes">
                <a href="{{ route('sizes.index') }}">
                    <i class="fa fa-list"></i>
                    <span> @lang('admin.size.manager') </span>
                </a>
            </li>
            @endcan
            @can('products.view')
            <li id="products">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-product-hunt"></i>
                    <span> @lang('admin.product.manager') </span>
                </a>
            </li>
            @endcan
            @can('orders.view')
            <li id="orders">
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-money"></i>
                    <span> @lang('admin.order.manager') </span>
                </a>
            </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
