<div class="body">
    <div class="hero-services">
        <img class="dots one" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots two" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <a href="<?php echo BASE_URL;?>domov">
        <img class="hero-logo" src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"/></a>
        <div class="hero-container">
            <div class="hero-backgroundImage">
                <div class="mediaContainer">
                    <video class="hero-backgroundImage" autoplay loop muted>
                        <source src="<?php echo BASE_URL; ?>assets/image/videos/hero-hydraulicka-ruka.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <img class="hero-rectangle" src="<?php echo BASE_URL; ?>assets/image/svgs/HeroRectangleBigger.svg" />
            <div class="text-container">
                <h1>Práce s hydraulic. rukou</h1>
                <p>Pracujeme s hydraulickou rukou, ku ktorej možno pripojiť pracovný kôš (plošinu) na zdvíhanie pracovníkov alebo rotačný drapák na presun materiálu.</p>
                <button class="button" onclick="scrollFunction()">Zisti viac</button>
            </div>
        </div>
    </div>
    <div class="sortiment" id="sortiment">
        <img class="dots seventeen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots eighteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots nineteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <div class="sortiment-container">
            <div class="sortiment-image two">
                <img src="<?php echo BASE_URL; ?>assets/image/images/hydraulicka-ruka-img.jpg" alt="Hydraulická ruka"/>
            </div>
            <div class="sortiment-text-container">
                <h2>Vlastnosti hydraulickej ruky</h2>
                <ul>
                    <li><span>Celkový dosah hydraulickej ruky je 18,5m</span></li>
                    <li><span>Maximálna hmotnosť zdvihu na <b>4,3m</b> je <b>4,5t</b></span></li>
                    <li><span>Maximálna hmotnosť zdvihu na <b>18,5m</b> je <b>0,8t</b></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sortiment" id="sortiment">
        <img class="dots seventeen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots eighteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots nineteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <div class="sortiment-container">
            <div class="sortiment-text-container">
                <h2>Ponúkané služby</h2>
                <p>V rámci nákladnej dopravy poskytujeme nasledovné služby:</p>
                <ul>
                    <li><span>Nákladka a výkladka osôb a materiálu</span></li>
                    <li><span>Prevoz stavebného materiálu</span></li>
                    <li><span>Prevoz kontajnerov</span></li>
                    <li><span>Prevoz strojov</span></li>
                    <li><span>Prevoz sypkého materiálu sklápačom</span></li>
                    <li><span>Odvoz sute</span></li>
                </ul>
            </div>
            <div class="sortiment-image two">
                <img src="<?php echo BASE_URL; ?>assets/image/images/hr.jpg" alt="Hydraulická ruka"/>
            </div>
        </div>
    </div>
   
    <div class="our-machines">
        <img class="dots twentysix" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots twentyseven" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots twentyeight" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots twentynine" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots thirty" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <h2>naše stroje</h2>
        <?php $vozidla = $db->query("SELECT * FROM vozovypark WHERE is_hydraulicke = 1 ORDER BY id DESC"); ?>
        <div class="our-machines-container">
        <?php if(sizeof($vozidla) > 0) {
                for ($i=0; $i < sizeof($vozidla); $i++) { ?>
                <a data-fslightbox="vozidla" href="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>" class="our-machines-card">
                    <div class="img-overlay"><img src="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>" alt="<?php echo $vozidla[$i][1]; ?>"/></div>
                    <div class="our-machines-card-content">
                        <p>vozidlo</p>
                        <h3><?php echo $vozidla[$i][1]; ?></h3>
                    </div>
                </a>
        <?php } } else { ?>
            <div class="emptyContainer">
                <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
                <h3>Žiadne vozidlá.</h3>
                <p>Neevidujeme žiadne vozidlá v databáze.</p>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="contactUs">
        <img class="dots thirteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots fourteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="dots fifteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" />
        <img class="contactUs-image" src="<?php echo BASE_URL; ?>assets/image/images/contactUs.png" alt=""/>
        <div class="contactUs-container">
            <div class="contactUs-content">
                <h3>Oslovila Vás naša ponuka?</h3>
                <p>Ak áno, neváhajte nás kontaktovať a pridajte sa k viac ako tisíc spokojným zákazníkom</p>
                <a class="button" href="<?php echo BASE_URL; ?>kontakt">Kontaktujte nás</a>
            </div>
        </div>
    </div>
</div>