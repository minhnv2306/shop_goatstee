<nav class="woocommerce-MyAccount-navigation">
    <ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
            <a href="{{ route('sites.my-account') }}"> @lang('sites.address.dashboard') </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
            <a href="{{ route('sites.my-order') }}"> @lang('sites.order.order') </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
            <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}"> @lang('sites.address.account_detail') </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                @lang('sites.account.logout')
            </a>
            {!! Form::open([
                'method' => 'POST',
                'route' => 'logout',
                'id' => 'logout-form',
            ]) !!}
            {!! Form::close() !!}
        </li>
    </ul>
</nav>
