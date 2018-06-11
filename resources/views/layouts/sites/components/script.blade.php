<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//www.googleadservices.com/pagead/conversion/925280851/?value=18.00&amp;currency_code=USD&amp;label=gGKGCOSW9nMQ09SauQM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/925280851/?guid=ON&script=0"/>
    </div>
</noscript>
<script type='text/javascript'>
    /* <![CDATA[ */
    var yith_wcwl_l10n = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "redirect_to_cart": "no",
        "multi_wishlist": "",
        "hide_add_button": "1",
        "is_user_logged_in": "",
        "ajax_loader_url": "https:\/\/goatstee.com\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader.gif",
        "remove_from_wishlist_after_add_to_cart": "yes",
        "labels": {
            "cookie_disabled": "We are sorry, but this feature is available only if cookies are enabled on your browser.",
            "added_to_cart_message": "<div class=\"woocommerce-message\">Product correctly added to cart<\/div>"
        },
        "actions": {
            "add_to_wishlist_action": "add_to_wishlist",
            "remove_from_wishlist_action": "remove_from_wishlist",
            "move_to_another_wishlist_action": "move_to_another_wishlsit",
            "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem"
        }
    };
    /* ]]> */
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Set hash for client
    if (!localStorage.getItem("hash")) {
        localStorage.setItem("hash", Math.random());
    }
</script>
<script src="{{asset('js/typeahead.bundle.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        var engine = new Bloodhound({
            remote: {
                url: 'find?q=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $(".search-input").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            source: engine.ttAdapter(),
            name: 'usersList',
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">{{trans('sites.search.no_result')}}</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    return '<a href="product/' + data.id + '" class="list-group-item">' + data.name + '</a>'
                }
            }
        });
    });
</script>
<script>
    new Vue({
        el: '#cart-header'
    });
</script>
<!-- Toastr -->
@if(!empty(session('message')))
    <script>
        toastr.success('{{ session('message') }}')
    </script>
@elseif(!empty(session('error')))
    <script>
        toastr.error('{{ session('error') }}')
    </script>
@endif
