<div class="body">
    <div class="hero-simple">
        <img class="dots thirtyone" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <img class="dots thirtytwo" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <a href="<?php echo BASE_URL; ?>domov">
            <img class="hero-logo" src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"></a>
        <div class="hero-container">
            <h2>Vozový Park</h2>
            <p class="vozovy-park-hero-text">Naša firma má k dispozicií najmodernejšiu techniku vyrabanú poprednými svetovými výrobcami a ovládanú profesionálnymi pracovníkmi.</p>
        </div>
    </div>
    <div class="machine-catalog">
        <img class="dots thirtythree" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <img class="dots thirtyfour" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <img class="dots thirtyfive" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <?php $vozidla = $db->query("SELECT * FROM vozovypark ORDER BY id DESC"); ?>
        <div class="machine-catalog-container <?php if (sizeof($vozidla) == 0) echo "empty"; ?>">
            <?php if (sizeof($vozidla) > 0) {
                for ($i = 0; $i < sizeof($vozidla); $i++) { ?>
                    <a class="machine-catalog-card" data-fslightbox="vozidla" href="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>">
                        <img src="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>" alt="<?php echo $vozidla[$i][1]; ?>">
                        <h4><?php echo $vozidla[$i][1]; ?></h4>
                        <?php if (!empty($vozidla[$i][4])) { ?>
                            <p><?php echo $vozidla[$i][4]; ?></p>
                        <?php } ?>
                    </a>
                <?php }
            } else { ?>
                <div class="emptyContainer">
                    <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg" alt="noIMG">
                    <h3>Žiadne vozidlá.</h3>
                    <p>Neevidujeme žiadne vozidlá v databáze.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>