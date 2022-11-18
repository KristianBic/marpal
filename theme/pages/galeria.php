<?php
    require_once("./theme/classes/Prispevok.php");
?>

<div class="body">
    <div class="hero-simple">
    <img class="dots thirtyone" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots thirtytwo" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
    <a href="<?php echo BASE_URL;?>domov">
        <img class="hero-logo" src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"/></a>
        <div class="hero-container">
            <h2>Galéria</h2>
            <p>Nahliadnite do galérie našich prác a projektov. Galériu pravidelne aktualizujeme.</p>
        </div>
    </div>
    <?php 
        $prispevky = new IteratorList($db, "Prispevok", "prispevky"); 
        $prispevky->load(" WHERE ciel_pridania LIKE '%web%' AND typ IN ('galeria','medium')");
        $totalCount = $prispevky->getCount();
        $itemsPerPage = 8;
        $pageNumberBtnCount = ceil($totalCount / $itemsPerPage);
    ?>
    <div class="gallery">
    <img class="dots nine" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
    <img class="dots ten" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
    <img class="dots eleven" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
    <img class="dots twelve" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
    <div class="galleryContainer" data-currentpage="1" data-totalcount="<?php echo $totalCount; ?>">
        <?php
            $prispevky = new IteratorList($db, "Prispevok", "prispevky"); 
            $prispevky->load(" WHERE ciel_pridania LIKE '%web%' AND typ IN ('galeria','medium') ORDER BY id DESC LIMIT $itemsPerPage OFFSET 0");
            if($prispevky->getCount() > 0) {
        ?>
        <div class="gallery-card-container">
            <?php while($prispevok = $prispevky->getNext()) { 
            if(($prispevok->getObrazky()) > 0) {?>
            <div class="gallery-card">
                <?php foreach ($prispevok->getObrazky() as $obrazok) { ?>
                        <a style="display: none" href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" data-fslightbox="<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>"></a>
                <?php } ?>
                <a href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" data-fslightbox="<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>">
                    <?php if(strpos($prispevok->getNahlad(), ".mp4") !== false){ ?>
                        <video preload="metadata" autoplay>
                            <source src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" type="video/mp4">
                        </video>
                    <?php } else { ?>
                        <img src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis()."_".$prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" />
                    <?php } ?>
                    <p class="gallery-date"><?php echo $prispevok->getDatumPridania("j.n.Y") ?></p>
                    <div class="gallery-card-content">
                        <p>projekt</p>
                        <h4><?php echo $prispevok->getNadpis(); ?></h4>
                        <button>Zobraziť
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.75 7.58333L10.0158 7.58333L7.9275 9.6775L8.75 10.5L12.25 7L8.75 3.5L7.9275 4.3225L10.0158 6.41667L1.75 6.41667V7.58333Z" fill="white" />
                            </svg>
                        </button>
                    </div>
                </a>
            </div>
        <?php } } ?>
            </div>
        <?php if($totalCount > $itemsPerPage) { ?>
            <div class="pagination">
                <?php echo getTablePagination($pageNumberBtnCount); ?>
            </div>
        <?php } } else { ?>
            <div class="emptyContainer">
                <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
                <h3>Žiadne galérie.</h3>
                <p>Zatiaľ sme nepridali žiadny záznam z nášho umenia, ale zostaňte nablízku, čoskoro pridáme!</p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>