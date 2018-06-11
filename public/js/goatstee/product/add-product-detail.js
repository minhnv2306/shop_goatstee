$('.delete-product').click(function (e) {
    e.preventDefault();
    $(this).parentsUntil('#product-content').remove();
})
