<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?= templates('assets') ?>js/popper.min.js"></script>
<script src="<?= templates('assets') ?>js/bootstrap.min.js"></script>

<script>
    function toogleMenu() {
        var x = document.getElementById("sideMenu");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<?php if ($script) $this->load->view($script); ?>

</body>

</html>