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
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "280px";
        document.getElementById("burgerMenu").style.display = "none";
        document.getElementById("wrapDetailInformasi").style.right = "18.5rem";
        document.getElementById("infoBox").style.right = "18.5rem";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("burgerMenu").style.display = "inline-block";
        document.getElementById("wrapDetailInformasi").style.right = "2.5rem";
        document.getElementById("infoBox").style.right = "1.5rem";
    }
</script>

<?php if ($script) $this->load->view($script); ?>

</body>

</html>