<script type="text/javascript" src="<?= assets() ?>mapplic/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= assets() ?>mapplic/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?= assets() ?>mapplic/mapplic/mapplic.js"></script>
<script>
    $(document).ready(function() {

        $.get('<?= site_url('siteplan/get-spots') ?>')
            .done(function(response) {
                if (response.success) {
                    var mapplic = $('#mapplic').mapplic({
                        source: response.data,
                        sidebar: false,
                        height: 576,
                        fullscreen: true,
                        maxscale: 1.8,
                        zoom: false,
                        zoombuttons: false,
                        fullscreen: false,
                        smartip: true,
                        moretext: "Lihat Foto 360"
                    });
                } else {
                    // alert(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                }
            })
            .fail(function() {
                alert("Failed to retrieved data!");
            });


        $('.usage').click(function(e) {
            e.preventDefault();
            $('.editor-window').slideToggle(200);
        });

        // to get x & y
        $(document).on('mousemove', '.mapplic-layer', function(e) {
            var map = $('.mapplic-map'),
                x = (e.pageX - map.offset().left) / map.width(),
                y = (e.pageY - map.offset().top) / map.height();
            $('.mapplic-coordinates-x').text(parseFloat(x).toFixed(4));
            $('.mapplic-coordinates-y').text(parseFloat(y).toFixed(4));
        });

        $('.editor-window .window-mockup').click(function() {
            $('.editor-window').slideUp(200);
        });
    });
</script>