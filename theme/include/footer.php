<div class="footer" id="footer">
    <div class="footer-container">
        <a class="footer-logo" href="<?php echo BASE_URL; ?>domov">
            <img src="<?php echo BASE_URL; ?>assets/image/images/marpal_png.png" alt="Marpal logo"></a>
        <div class="footer-columnOfLinks">
            <h4>Odkazy</h4>
            <ul>
                <li><a class="link" href="<?php echo BASE_URL; ?>galeria">Galéria</a></li>
                <li><a class="link" href="<?php echo BASE_URL; ?>referencie">Referencie</a></li>
                <li><a class="link" href="<?php echo BASE_URL; ?>kontakt">Kontakt</a></li>
                <?php if (!isset($_SESSION['loggedIn'])) { ?>
                    <li><a class="link" href="<?php echo BASE_URL; ?>login">Prihlásenie</a></li>
                <?php } else { ?>
                    <li><a class="link" href="<?php echo BASE_URL; ?>admin/galeria">Admin</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="footer-columnOfLinks">
            <h4>Naše služby</h4>
            <ul>
                <li><a class="link" href="<?php echo BASE_URL; ?>vrtne-prace">Vrtné práce</a></li>
                <li><a class="link" href="<?php echo BASE_URL; ?>stavebne-prace">Stavebné práce</a></li>
                <li><a class="link" href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zemné a výkopové práce</a></li>
                <li><a class="link" href="<?php echo BASE_URL; ?>hydraulicka-ruka">Hydraulická ruka</a></li>
            </ul>
        </div>
        <div class="footer-columnOfLinks">
            <h4>Sociálne siete</h4>
            <ul>
                <li><a class="link" href="https://www.instagram.com/_vrtanie_studni_/">Instagram</a></li>
                <li><a class="link" href="https://www.facebook.com/Marpal-102560028949170">Facebook</a></li>
            </ul>
        </div>
        <div class="footer-copyright">
            <p>2021 Marpal s.r.o. © Všetky práva vyhradené. </p>
        </div>
    </div>
</div>