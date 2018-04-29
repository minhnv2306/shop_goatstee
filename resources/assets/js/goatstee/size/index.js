$(document).ready(function () {
    $('#sizes').addClass('active');

    // Get route
    var url = $('#routeAjax').val();

    $('#filter').click(function () {
        var cate_id = $('#category_id').val();
        $.ajax({
            // Add category_id in url link
            url: url.substr(0, url.length - 1) + cate_id,
            type: 'GET',
            success: function (data) {
                $('#example2').html(data);
            }
        })
    })
})
