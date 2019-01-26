<?php ?>

<script>
    $(document).ready(function() {
        $('li.active').removeClass('active');
        let li = $('a[href="' + location.pathname + '"]').closest('li');
        li.addClass('active');
        li.children('a').css({
            'background-color': '#fff',
            'color': '#993300 !important',
        });
        li.parent().parent().addClass('active');
    });
</script>

</body>
</html>
