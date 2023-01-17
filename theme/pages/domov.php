<?php
require_once("./theme/classes/Prispevok.php");
?>
<div class="body">
    <div class="hero">
        <img class="dots one" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots two" src="./assets/image/icons/dots.svg" alt="Dots">
        <a href="<?php echo BASE_URL; ?>domov">
            <img class="hero-logo" src="./assets/image/images/marpal_png.png" alt="Marpal logo">
        </a>
        <div class="hero-container">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide vrty">
                        <div class="mediaContainer">
                            <video id="firstVid" class="hero-backgroundImage" autoplay loop muted>
                                <source src="./assets/image/videos/hero-vrtne-prace.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="swiper-slide stav">
                        <div class="mediaContainer">
                            <video id="secondVid" class="hero-backgroundImage" preload="none" autoplay loop muted>
                                <source src="./assets/image/videos/hero-stavebne-prace.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="swiper-slide zem">
                        <div class="mediaContainer">
                            <video id="thirdVid" class="hero-backgroundImage" preload="none" autoplay loop muted>
                                <source src="./assets/image/videos/hero-zemne-prace.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev">
                    <svg class="arrow_left" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" fill="#F4F4F4" />
                        <path d="M30.606 16.3067L21.9317 24.9999L30.606 33.693L27.9355 36.3635L16.5719 24.9999L27.9355 13.6362L30.606 16.3067Z" fill="#A1BFFF" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg class="arrow_right" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" transform="rotate(-180 25 25)" fill="#F4F4F4" />
                        <path d="M19.3938 33.6933L28.068 25.0001L19.3938 16.307L22.0643 13.6365L33.4279 25.0001L22.0643 36.3638L19.3938 33.6933Z" fill="#A1BFFF" />
                    </svg>
                </div>

                <img class="hero-rectangle" src="./assets/image/svgs/HeroRectangleBigger.svg" alt="rectangle">
                <div class="text-Container">
                    <div class="text" data-slide_number="1">
                        <h1>špecialisti na vŕtanie studní</h1>
                        <p>Poskytujeme prvotriednu a profesionálnu realizáciu studní na mieru pre maximálnu spokojnosť
                            zákazníka.</p>
                        <a class="button" href="<?php echo BASE_URL; ?>vrtne-prace">Zisti viac</a>
                    </div>
                    <div class="text hidden" style="display: none" data-slide_number="2">
                        <h1>profi realizácie rodinných domov</h1>
                        <p>Váš vysnívaný rodinný dom sa môže ľahko stať skutočnosťou. Zverte nám do rúk Váš projekt a
                            pridajte sa k stovkám spokojných zákazníkov.</p>
                        <a class="button" href="<?php echo BASE_URL; ?>stavebne-prace">Zisti viac</a>
                    </div>
                    <div class="text hidden" style="display: none" data-slide_number="3">
                        <h1>široká ponuka zemných prác</h1>
                        <p>Ponúkame zemné, výkopové a demolačné práce, terénne úpravy a odvoz stavebných sutín.</p>
                        <a class="button" href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zisti viac</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="services">
        <img class="dots three" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots four" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots five" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots six" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots seven" src="./assets/image/icons/dots.svg" alt="Dots">
        <img class="dots eight" src="./assets/image/icons/dots.svg" alt="Dots">
        <h2>Ponuka našich služieb</h2>
        <div class="services-container">
            <div class="service-card">
                <a class="service-card-link" href="<?php echo BASE_URL; ?>vrtne-prace">
                    <div class="img-overlay">
                        <img src="./assets/image/images/homepage-services-vrtanie.png" alt="Vŕtanie studne">
                    </div>
                    <h3>Vrtné práce</h3>
                    <p>Firma sa zameriava na vrtanie studní, vrty pre tepelné čerpadlá, geologické, prieskumné, odvodňovacie a stavebné vrty. </p>
                    <div class="button"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8.66667H11.4467L9.06 11.06L10 12L14 8L10 4L9.06 4.94L11.4467 7.33333H2V8.66667Z" fill="#2E74FF" />
                        </svg>
                        Zisti viac</div>
                </a>
            </div>
            <div class="service-card">
                <a class="service-card-link" href="<?php echo BASE_URL; ?>stavebne-prace">
                    <div class="img-overlay">
                        <img src="./assets/image/images/homepage-services-stavba.png" alt="Stavebné práce">
                    </div>
                    <h3>Stavebné práce</h3>
                    <p>Ponúkame realizáciu všetkých druhov stavieb, od stavieb rodinných domov až po rekonštrukciu a modernizáciu všetkých typov budov.</p>
                    <div class="button"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8.66667H11.4467L9.06 11.06L10 12L14 8L10 4L9.06 4.94L11.4467 7.33333H2V8.66667Z" fill="#2E74FF" />
                        </svg>
                        Zisti viac</div>
                </a>
            </div>
            <div class="service-card">
                <a class="service-card-link" href="<?php echo BASE_URL; ?>zemne-vykopove-prace">
                    <div class="img-overlay">
                        <img src="./assets/image/images/homepage-services-vykop.png" alt="Výkopové práce">
                    </div>
                    <h3>Zemné a výkopové práce</h3>
                    <p>Poskytujeme širokú škálu zemných, výkopových, búracích a demolačných prác. Ťažko dostupný terén nieje prekážkou.</p>
                    <div class="button"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8.66667H11.4467L9.06 11.06L10 12L14 8L10 4L9.06 4.94L11.4467 7.33333H2V8.66667Z" fill="#2E74FF" />
                        </svg>
                        Zisti viac</div>
                </a>
            </div>
        </div>
        <div class="statistics">
            <div class="statistics-container">
                <div class="single-stat one">
                    <svg width="87" height="87" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_786:33106)">
                            <rect x="4" width="79" height="79" rx="39.5" fill="white" />
                            <g clip-path="url(#clip0_786:33106)">
                                <path d="M49.2615 34.7455C48.8085 34.7455 48.3277 34.3959 48.1873 33.9651L43.7535 20.32C43.6132 19.8891 43.3868 19.8891 43.2464 20.32L38.8134 33.9651C38.6731 34.396 38.1923 34.7455 37.7393 34.7455H23.3917C22.9387 34.7455 22.8681 34.9614 23.2349 35.2281L34.8417 43.6599C35.2085 43.9266 35.3923 44.4919 35.252 44.9228L30.8191 58.5672C30.6788 58.998 30.8626 59.1317 31.2294 58.8651L42.8362 50.4333C43.2029 50.1666 43.7971 50.1666 44.1639 50.4333L55.7707 58.8659C56.1375 59.1326 56.3213 58.9988 56.181 58.568L51.748 44.9236C51.6077 44.4927 51.7915 43.9274 52.1583 43.6607L63.7651 35.2289C64.1318 34.9622 64.0613 34.7463 63.6083 34.7463H49.2615V34.7455Z" fill="#2E74FF" />
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_d_786:33106" x="0" y="0" width="87" height="87" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_786:33106" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_786:33106" result="shape" />
                            </filter>
                            <clipPath id="clip0_786:33106">
                                <rect width="41" height="41" fill="white" transform="translate(23 19)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="single-stat-text">
                        <h2>13+</h2>
                        <p>Rokov skúsenosti</p>
                    </div>
                </div>
                <div class="single-stat">
                    <svg width="87" height="87" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_786:33125)">
                            <rect x="4" width="79" height="79" rx="39.5" fill="white" />
                            <g clip-path="url(#clip0_786:33125)">
                                <path d="M63.7883 52.0588L53.1251 41.4318C52.3758 40.685 51.0873 41.2141 51.0873 42.273V51.4672H49.6835C49.376 51.4672 49.1258 51.2178 49.1258 50.9113L49.098 40.805C49.098 39.9486 48.5441 39.1898 47.7265 38.9263L47.1578 38.743V24.3211C47.1578 23.5796 46.5546 22.9784 45.8105 22.9784H32.2812C31.5371 22.9784 30.9338 23.5796 30.9338 24.3211V33.5124L29.7688 33.1367C28.7615 32.8119 27.7292 33.5623 27.7292 34.6155V36.6988H24.5596C23.6982 36.6989 23 37.3947 23 38.2531V47.8403C24.2616 45.8448 26.491 44.5152 29.0274 44.5152C31.3761 44.5152 33.462 45.655 34.7597 47.4081C36.0574 45.655 38.1433 44.5152 40.4921 44.5152C42.9701 44.5152 45.1554 45.784 46.4311 47.7032C47.1767 48.8249 47.6124 50.1682 47.6124 51.6115C47.6124 52.171 47.545 52.7148 47.4216 53.2373C48.0074 53.8033 48.8052 54.1527 49.6835 54.1527H54.8595V54.0898H62.9442C64.0039 54.0897 64.5396 52.8076 63.7883 52.0588ZM44.4632 35.4707L42.4307 33.138C41.9427 32.5781 41.0918 32.5184 40.53 33.0046C39.9682 33.4908 39.9082 34.3389 40.3961 34.8988L42.4125 37.2129L33.6286 34.381V25.6639H44.4632V35.4707Z" fill="#2E74FF" />
                                <path d="M29.0278 47.2003C26.5836 47.2003 24.6021 49.175 24.6021 51.6111C24.6021 54.047 26.5835 56.0218 29.0278 56.0218C31.5198 56.0218 33.4646 53.9817 33.4646 51.611C33.4646 49.2417 31.5213 47.2003 29.0278 47.2003ZM29.0278 52.9973C28.2597 52.9973 27.6369 52.3767 27.6369 51.6111C27.6369 50.8455 28.2596 50.2249 29.0278 50.2249C29.796 50.2249 30.4188 50.8455 30.4188 51.6111C30.4188 52.3767 29.796 52.9973 29.0278 52.9973Z" fill="#2E74FF" />
                                <path d="M40.4922 47.2003C38.0478 47.2003 36.0664 49.175 36.0664 51.6111C36.0664 54.047 38.0478 56.0218 40.4922 56.0218C42.9363 56.0218 44.9178 54.0471 44.9178 51.6111C44.9178 49.175 42.9364 47.2003 40.4922 47.2003ZM40.4922 52.9973C39.724 52.9973 39.1012 52.3767 39.1012 51.6111C39.1012 50.8455 39.7239 50.2249 40.4922 50.2249C41.2604 50.2249 41.8831 50.8455 41.8831 51.6111C41.8832 52.3767 41.2603 52.9973 40.4922 52.9973Z" fill="#2E74FF" />
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_d_786:33125" x="0" y="0" width="87" height="87" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_786:33125" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_786:33125" result="shape" />
                            </filter>
                            <clipPath id="clip0_786:33125">
                                <rect width="41.1393" height="41" fill="white" transform="translate(23 19)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="single-stat-text">
                        <h2>20</h2>
                        <p>Profesionálnych strojov</p>
                    </div>
                </div>
                <div class="single-stat three">
                    <svg width="87" height="87" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_786:33142)">
                            <rect x="4" width="79" height="79" rx="39.5" fill="white" />
                            <g clip-path="url(#clip0_786:33142)">
                                <path d="M43.5 35.5465C47.3477 35.5465 50.4668 32.4274 50.4668 28.5797C50.4668 24.7321 47.3477 21.6129 43.5 21.6129C39.6523 21.6129 36.5332 24.7321 36.5332 28.5797C36.5332 32.4274 39.6523 35.5465 43.5 35.5465Z" fill="#2E74FF" />
                                <path d="M57.5938 35.5464C60.0262 35.5464 61.998 33.5745 61.998 31.1421C61.998 28.7097 60.0262 26.7378 57.5938 26.7378C55.1613 26.7378 53.1895 28.7097 53.1895 31.1421C53.1895 33.5745 55.1613 35.5464 57.5938 35.5464Z" fill="#2E74FF" />
                                <path d="M29.4062 35.5464C31.8387 35.5464 33.8105 33.5745 33.8105 31.1421C33.8105 28.7097 31.8387 26.7378 29.4062 26.7378C26.9738 26.7378 25.002 28.7097 25.002 31.1421C25.002 33.5745 26.9738 35.5464 29.4062 35.5464Z" fill="#2E74FF" />
                                <path d="M33.7457 39.5015C32.012 38.0811 30.4419 38.2691 28.4373 38.2691C25.4392 38.2691 23 40.6939 23 43.6736V52.4189C23 53.713 24.0562 54.7652 25.3551 54.7652C30.9626 54.7652 30.2871 54.8667 30.2871 54.5234C30.2871 48.3264 29.5531 43.7819 33.7457 39.5015Z" fill="#2E74FF" />
                                <path d="M45.4068 38.3012C41.9054 38.0091 38.8621 38.3045 36.237 40.4713C31.8442 43.9899 32.6896 48.7276 32.6896 54.5234C32.6896 56.0568 33.9372 57.3277 35.4939 57.3277C52.397 57.3277 53.0697 57.873 54.072 55.6533C54.4007 54.9026 54.3107 55.1412 54.3107 47.9602C54.3107 42.2565 49.372 38.3012 45.4068 38.3012Z" fill="#2E74FF" />
                                <path d="M58.5628 38.269C56.5472 38.269 54.9858 38.0829 53.2544 39.5014C57.4157 43.7501 56.713 47.9845 56.713 54.5233C56.713 54.8687 56.1522 54.7651 61.5609 54.7651C62.9062 54.7651 64.0001 53.6753 64.0001 52.3356V43.6735C64.0001 40.6938 61.5609 38.269 58.5628 38.269Z" fill="#2E74FF" />
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_d_786:33142" x="0" y="0" width="87" height="87" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_786:33142" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_786:33142" result="shape" />
                            </filter>
                            <clipPath id="clip0_786:33142">
                                <rect width="41" height="41" fill="white" transform="translate(23 19)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="single-stat-text">
                        <h2 class="counter">1000+</h2>
                        <p>Spokojných zákaznikov</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery">
            <img class="dots nine" src="./assets/image/icons/dots.svg" alt="Dots">
            <img class="dots ten" src="./assets/image/icons/dots.svg" alt="Dots">
            <img class="dots eleven" src="./assets/image/icons/dots.svg" alt="Dots">
            <img class="dots twelve" src="./assets/image/icons/dots.svg" alt="Dots">
            <div class="gallery-image">
                <img src="./assets/image/images/gallery_home-page.png" alt="Sídlo Marpalu">
                <h2>Galéria PROJEKTOV</h2>
                <p>Nahliadnite bližšie do galérie naších úspešných projektov.</p>
            </div>
            <?php
            $prispevky = new IteratorList($db, "Prispevok", "prispevky");
            $prispevky->load(" WHERE ciel_pridania LIKE '%web%' AND typ IN ('galeria','medium') ORDER BY id DESC LIMIT 4");
            if ($prispevky->getCount() > 0) {
            ?>
                <div class="galleryContainer">
                    <div class="gallery-card-container">
                        <?php while ($prispevok = $prispevky->getNext()) {
                            if (($prispevok->getObrazky()) > 0) { ?>
                                <div class="gallery-card">
                                    <?php foreach ($prispevok->getObrazky() as $obrazok) { ?>
                                        <a style="display: none" href="./assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>"></a>
                                    <?php } ?>
                                    <a href="./assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>">
                                        <?php if (strpos($prispevok->getNahlad(), ".mp4") !== false) { ?>
                                            <video preload="metadata" autoplay>
                                                <source src="./assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" type="video/mp4">
                                            </video>
                                        <?php } else { ?>
                                            <img alt="galeryPost" src="./assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>">
                                        <?php } ?>
                                        <p class="gallery-date"><?php echo $prispevok->getDatumPridania("j.n.Y") ?></p>
                                        <div class="gallery-card-content">
                                            <p>projekt</p>
                                            <h4><?php echo $prispevok->getNadpis(); ?></h4>
                                            <div class="galButton">Zobraziť
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.75 7.58333L10.0158 7.58333L7.9275 9.6775L8.75 10.5L12.25 7L8.75 3.5L7.9275 4.3225L10.0158 6.41667L1.75 6.41667V7.58333Z" fill="white" />
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php }
                        } ?>

                    </div>
                    <div class="gallery-showMore">
                        <a class="button" href="<?php echo BASE_URL; ?>galeria">Viac z galérie</a>
                    </div>
                </div>

            <?php } else { ?>
                <div class="emptyContainer">
                    <img src="./assets/image/icons/noImages.svg">
                    <h3>Žiadne galérie.</h3>
                    <p>Zatiaľ sme nepridali žiadny záznam z nášho umenia, ale zostaňte nablízku, čoskoro pridáme!</p>
                </div>
            <?php } ?>

            <div class="contactUs">
                <img class="dots thirteen" src="./assets/image/icons/dots.svg" alt="Dots">
                <img class="dots fourteen" src="./assets/image/icons/dots.svg" alt="Dots">
                <img class="dots fifteen" src="./assets/image/icons/dots.svg" alt="Dots">
                <img class="contactUs-image" src="./assets/image/images/contactUs.png" alt="Dots">
                <div class="contactUs-container">
                    <div class="contactUs-content">
                        <h3>Oslovila Vás naša ponuka?</h3>
                        <p>Ak áno, neváhajte nás kontaktovať a pridajte sa k viac ako tisíc spokojným zákazníkom</p>
                        <a class="button" href="<?php echo BASE_URL; ?>kontakt">Kontaktujte nás</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>