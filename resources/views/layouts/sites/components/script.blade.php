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
    if (!localStorage.getItem("hash")) {
        localStorage.setItem("hash", $('#hash').val());
    } else {
        $('#hash').val(localStorage.getItem("hash"));
    }
</script>
<script>
    $.ajax({
        url: "/getNumberProduct/" + localStorage.getItem("hash"), success: function (result) {
            $('.header-cart').html(result);
        }
    });
</script>
