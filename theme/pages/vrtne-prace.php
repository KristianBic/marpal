<div class="body">
    <div class="hero-services">
        <img class="dots one" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <img class="dots two" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <a href="<?php echo BASE_URL; ?>domov">
            <img class="hero-logo" src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"></a>
        <div class="hero-container">
            <div class="hero-backgroundImage">
                <div class="mediaContainer">
                    <video class="hero-backgroundImage" autoplay loop muted>
                        <source src="<?php echo BASE_URL; ?>assets/image/videos/hero-vrtne-prace.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <img class="hero-rectangle" src="<?php echo BASE_URL; ?>assets/image/svgs/HeroRectangleBigger.svg" alt="rectangle">
            <div class="text-container">
                <h1>Vrtné práce</h1>
                <p>Ponúkame realizáciu stavebných a geologických vrtov. Stavebné vrty sú s nami možné až do hĺbky 22m a priemeru 900 mm. Geologické vrty vŕtame do 500m.</p>
                <button class="button" onclick="scrollFunction()">Zisti viac</button>
            </div>
        </div>
    </div>
    <div class="motto" id="motto">
        <p>Naše motto znie:</p>
        <h3>"Prinášame čistú vodu všade tam, kde ju potrebujete."</h3>
    </div>
    <div class="precoContainer">
        <h3 class="mainTitle">Prečo vŕtaná studňa od nás?</h3>
        <div class="cards">
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/waterdrop.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Vyššia kvalita vody</h3>
                    <p>Čistejšia a kvalitnejšia voda</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/weather.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Vŕtame celoročne</h3>
                    <p>Za každých podmienok</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/euro.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Vďačná investícia</h3>
                    <p>Ušetríte peniaze</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/teren.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Nepoznáme výzvy</h3>
                    <p>Náročný terén nieje prekážkou</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/waterwell.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Vlastný zdroj vody</h3>
                    <p>Nezávislý od lokálneho vodovodného systému</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <?php include('./assets/image/icons/vrstvy.svg');  ?>
                </div>
                <div class="popis">
                    <h3>Vŕtame do všetkého</h3>
                    <p>Vŕtame do všetkých geologických podloží</p>
                </div>
            </div>
        </div>
    </div>
    <div class="druhy-vrtov" id="druhy_vrtov">
        <input type="radio" name="slider" checked id="bez_klucu">
        <input type="radio" name="slider" id="na_kluc">
        <div class="tabNav">
            <label for="bez_klucu" class="bez_klucu">SAMOSTATNÝ VRT</label>
            <label for="na_kluc" class="na_kluc">STUDŇA NA KĽÚČ</label>
            <div class="slider"></div>
            <div class="slider-line"></div>
        </div>
        <section>
            <div class="content content-1">
                <div class="druhy-vrtov-text-container">
                    <h2>Samostatný vrt</h2>
                    <p>Cena vyvŕtanej diery začína na <b>60€</b> za <b>meter vrtu.</b></p>
                    <ul>
                        <li>Vŕtanie studne na mieru bez osadenia.</li>
                        <li>Ceny vrtu sa odvíjajú od priemeru a výstroje. </li>
                        <li>Vrty pre tepelné čerpadlá, geologické prieskumné, odvodňovacie a stavebné vrty. </li>
                    </ul>
                </div>
                <div class="druhy-vrtov-image">
                    <video autoplay loop muted>
                        <source src="<?php echo BASE_URL; ?>assets/image/videos/vrtanie-studni2-cropped.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="content content-2">
                <div class="druhy-vrtov-text-container">
                    <h2>Studňa na kľúč</h2>
                    <p>Cena vyvŕtanej diery začína na <b>60€</b> za <b>meter vrtu.</b></p>
                    <ul>
                        <li>Vŕtanie studne aj s osadením. </li>
                        <li>Realizácia studne do konečného stavu od vrtu po osadenie. </li>
                        <li>Prvotriedna, rýchla a praktická inštalácia studne. </li>
                    </ul>
                </div>
                <div class="druhy-vrtov-image">
                    <video autoplay loop muted>
                        <source src="<?php echo BASE_URL; ?>assets/image/videos/vrtanie-studni-kluc-crop.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </section>
    </div>
    <h1 class="mainTitle">Postup našej práce</h1>
    <p class="mainParagraph">Tento postup uplatňujeme na každom našom projekte.</p>
    <div class="roadmap">
        <div class="roadmap-container one">
            <?php require_once "assets/image/svgs/roadmap.svg"; ?>
        </div>
        <div class="roadmap-container two">
            <?php require_once "assets/image/svgs/roadmap-mobile.svg"; ?>
        </div>
    </div>
    <div class="contactUs">
        <img class="dots thirteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <img class="dots fourteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <img class="dots fifteen" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="dots">
        <img class="contactUs-image" src="<?php echo BASE_URL; ?>assets/image/images/contactUs.png" alt="dots">
        <div class="contactUs-container">
            <div class="contactUs-content">
                <h3>Oslovila Vás naša ponuka?</h3>
                <p>Ak áno, neváhajte nás kontaktovať a pridajte sa k viac ako tisíc spokojným zákazníkom</p>
                <a class="button" href="<?php echo BASE_URL; ?>kontakt">Kontaktujte nás</a>
            </div>
        </div>
    </div>
</div>