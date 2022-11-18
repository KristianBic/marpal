<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/7a129153dd.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo BASE_URL;?>assets/js/general.js"></script>
<?php if($page == "domov")  { ?>
<script src="<?php echo BASE_URL;?>theme/libraries/swiperjs/swiper-bundle.min.js"></script>
<?php 
    }
    $dir = './assets/js/' . $page . ".js";
    if(file_exists($dir)){
?>
    <script async src="<?php echo BASE_URL;?>assets/js/<?php echo $page; ?>.js"></script>
<?php } ?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php if($page == "galeria" || $page == "domov" || $page == "hydraulicka-ruka" || $page == "vozovy-park")  { ?>
  <script src="<?php echo BASE_URL; ?>theme/libraries/lightbox/fslightbox.js" referrerpolicy="origin"></script>
<?php } ?>
