<div class="body">
    <div class="hero-simple">
        <img class="dots thirtyone" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <img class="dots thirtytwo" alt="dots" src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg">
        <a href="<?php echo BASE_URL; ?>domov">
            <img class="hero-logo" src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"></a>
        <div class="hero-container">
            <h2>Kontaktujte nás</h2>
            <p>Ak máte záujem o niektorú z našich služieb, neváhajte využiť náš kontaktný formulár a napíšte nám správu.</p>
        </div>
    </div>
    <div class="contact">

        <div class="contact-container">
            <div class="contact-container-left">
                <img class="mail one" src="<?php echo BASE_URL; ?>assets/image/svgs/mail.svg" alt="dots">
                <img class="mail two" src="<?php echo BASE_URL; ?>assets/image/svgs/mail.svg" alt="dots">
                <img class="mail three" src="<?php echo BASE_URL; ?>assets/image/svgs/mail.svg" alt="dots">
                <img class="mail four" src="<?php echo BASE_URL; ?>assets/image/svgs/mail.svg" alt="dots">
                <h3>Kontaktné informácie</h3>
                <p></p>
                <ul class="li-group one">
                    <li class="li-caption">Sídlo firmy</li>
                    <li data-base_url="<?php echo BASE_URL; ?>marpal/assets/image/icons/location.svg"><?php $item = new KontaktInfo($db, -1, "sidlo");
                                                                                                        echo $item->getHodnota(); ?></li>
                </ul>
                <ul class="li-group one">

                    <li class="li-caption">Korešpondenčná adresa</li>
                    <li><?php $item = new KontaktInfo($db, -1, "korAdresa");
                        echo $item->getHodnota(); ?></li>
                </ul>
                <ul class="li-group two">
                    <li class="li-caption">IBAN</li>
                    <li><?php $item = new KontaktInfo($db, -1, "iban");
                        echo $item->getHodnota(); ?></li>
                </ul>
                <ul class="li-group three">
                    <li class="li-caption">Konateľ firmy</li>
                    <li><?php $item = new KontaktInfo($db, -1, "konatel");
                        echo $item->getHodnota(); ?></li>
                </ul>
                <ul class="li-group four">
                    <li class="li-caption">IČO</li>
                    <li><?php $item = new KontaktInfo($db, -1, "ico");
                        echo $item->getHodnota(); ?></li>
                </ul>
                <ul class="li-group five">
                    <li class="li-caption">IČ DPH</li>
                    <li><?php $item = new KontaktInfo($db, -1, "icdph");
                        echo $item->getHodnota(); ?></li>
                </ul>
            </div>
            <div class="contact-container-right formContainer">
                <div class="input-block one">
                    <label>Meno</label>
                    <input type="text" id="meno" placeholder="Vaše meno">
                </div>
                <div class="input-block one">
                    <label>Priezvisko</label>
                    <input type="text" id="priezvisko" placeholder="Vaše priezvisko">
                </div>
                <div class="input-block one">
                    <label>Tel. číslo</label>
                    <input type="tel" id="telefon" placeholder="Váš telefón">
                </div>
                <div class="input-block one">
                    <label>Email</label>
                    <input type="email" id="email" placeholder="Váš email">
                </div>
                <div class="input-block two">
                    <label>Predmet správy</label>
                    <input type="text" id="predmet" placeholder="Predmet">
                </div>
                <div class="input-block two">
                    <label>Správa</label>
                    <textarea id="sprava" placeholder="Vaša správa"></textarea>
                </div>
                <button class="form-button button sendEmailBtn">Odoslať</button>
            </div>
        </div>
    </div>
    <div class="map">
        <div class="map-container">
            <iframe height="300" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%C5%A0t%C3%BArov%C3%A1%201211/63%20kysucke%20nove%20mesto+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>
    </div>
</div>