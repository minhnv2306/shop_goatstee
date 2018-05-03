<script>
    $('.deleteElement').click(function (e) {
        if(!confirm('{{trans('admin.category.delete')}}')) {
            e.preventDefault();
        }
    })
</script>
