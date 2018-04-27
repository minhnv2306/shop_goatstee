@if ($errors->any())
    <div class="woocommerce-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif(!empty(session('message')))
    <div class="woocommerce-info">
        <p>{{ session('message') }}</p>
    </div>
@endif
