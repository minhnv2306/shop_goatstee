jQuery(document).ready(function ($) {
    addHoverEffect($);
});

jQuery(document).ajaxComplete(function ($) {
    addHoverEffect($);
});

function addHoverEffect($) {
    jQuery('img').each(function (index) {
        src = jQuery(this).attr('src');
        if (src.split('?')[1] == 'fifu') {
            if ("") {
                jQuery(this).replaceWith('<div id="hover" class=""><div><figure>'.concat(jQuery(this).parent().html()).concat('</figure></div></div>'));
            }
        }
    });
}
jQuery(document).ready(function ($) {
    replaceImage($);
    resize($);
    replaceIframe($);
    resize($);
});

jQuery(document).mouseover(function ($) {
    jQuery("a.cart-contents").mouseover(function ($) {
        replaceIframe($);
    });
});

function resize($) {
    var vidSelector = ".post iframe, .page iframe, .widget-content iframe, .product iframe, .wp-admin iframe, .tax-product_cat iframe";
    var resizeVideo = function (sSel) {
        $(sSel).each(function () {
            var $video = $(this),
                $container = $video.parent(),
                iTargetWidth = $container.width();

            if (!$video.attr("data-origwidth")) {
                $video.attr("data-origwidth", $video.attr("width"));
                $video.attr("data-origheight", $video.attr("height"));
            }

            var ratio = iTargetWidth / $video.attr("data-origwidth");

            $video.css("width", iTargetWidth + "px");
            $video.css("height", ($video.attr("data-origheight") * ratio) + "px");
        });
    };
    resizeVideo(vidSelector);
}

function replaceIframe($) {
    jQuery('iframe').each(function (index) {
        var src = jQuery(this).attr('src');
        if (src.indexOf('www.youtube.com') >= 0) {
            var style = jQuery(this).attr('style');
            if (!style) {
                jQuery(this).replaceWith('<div><iframe src="' + src + '" height="3" width="4" allowfullscreen frameborder="0" data-origwidth="4" data-origheight="3" style="width:100%;height:100%"></iframe></div>');
            } else {
                var width = style.split('width: ')[1].split('px')[0];
                if (width < 100) {
                    var id = src.split('embed/')[1].split('"')[0];
                    jQuery(this).replaceWith('<img src="http://img.youtube.com/vi/' + id + '/default.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">');
                }
            }
        }
    });
}

function replaceImage($) {
    jQuery('img').each(function (index) {
        src = jQuery(this).attr('src');
        if (src.indexOf('www.youtube.com') >= 0)
            jQuery(this).replaceWith('<div><iframe src="' + src + '" height="3" width="4" allowfullscreen frameborder="0"></iframe></div>');
    });
}