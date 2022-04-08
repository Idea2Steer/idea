
    <!-- latest jquery-->
    <script src="<?=base_url('public/front_assets/assets/js/jquery-3.3.1.min.js');?>"></script>

    <!-- slick js-->
    <script src="<?=base_url('public/front_assets/assets/js/slick.js');?>"></script>

    <!-- menu js-->
    <script src="<?=base_url('public/front_assets/assets/js/menu.js');?>"></script>

    <!-- add to cart js -->
    <script src="<?=base_url('public/front_assets/assets/js/addtocart.js');?>"></script>

    <!-- lazyload js-->
    <script src="<?=base_url('public/front_assets/assets/js/lazysizes.min.js');?>"></script>

    <!-- Bootstrap js-->
    <script src="<?=base_url('public/front_assets/assets/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Bootstrap Notification js-->
    <script src="<?=base_url('public/front_assets/assets/js/bootstrap-notify.min.js');?>"></script>

    <!-- Timer js-->
    <script src="<?=base_url('public/front_assets/assets/js/timer.js');?>"></script>

    <!-- Theme js-->
    <script src="<?=base_url('public/front_assets/assets/js/theme-setting.js');?>"></script>
    <script src="<?=base_url('public/front_assets/assets/js/script.js');?>"></script>

    <script>
        // modal popup
        $(window).on('load', function () {
            setTimeout(function () {
               // $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>


    <script src="<?=base_url('public/myCustomJs.js');?>"></script>