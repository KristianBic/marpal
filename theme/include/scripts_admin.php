  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo BASE_URL;?>admin/assets/js/core/popper.min.js"></script>
  <script src="<?php echo BASE_URL;?>admin/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo BASE_URL;?>admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo BASE_URL;?>admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?php echo BASE_URL;?>admin/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/js/admin/general.js"></script>
  <script src="<?php echo BASE_URL; ?>theme/libraries/lordicon/lord-icon-2.1.0.js"></script>

  <?php if($page == "galeria" || $page == "vozovy-park") { ?>
  <script src="<?php echo BASE_URL; ?>theme/libraries/lightbox/fslightbox.js" referrerpolicy="origin"></script>
  <?php } if($page == "galeria") { ?>
    <script src="<?php echo BASE_URL; ?>theme/libraries/tinyMCE/tinymce.min.js" referrerpolicy="origin"></script>
  <?php } ?>
  <script src="<?php echo BASE_URL;?>assets/js/admin/<?php echo $page; ?>.js"></script>
  

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo BASE_URL;?>admin/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>