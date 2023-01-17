<!-- <span><div><p><h1>-<h6> -->
<!-- <img src="<?php echo BASE_URL; ?>assets/image/icons/icon.svg" alt="">
BASE URL = https://localhost/marpal/ (if LOCALHOST == TRUE) -->
<!-- <img src="<?php echo BASE_URL; ?>assets/image/icons/dots.svg" alt="Bodky"> -->


<div class="header flex">
    <div>
        <!--    <a class="header-logo" href="<?php echo BASE_URL; ?>domov">Marpal</a> -->
        <a href="<?php echo BASE_URL; ?>domov">
            <img alt="Marpal logo" class="header-logo" src="<?php echo BASE_URL; ?>assets/image/svgs/logo.svg">
        </a>
    </div>

    <svg class="mobile-nav-open" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 18H21V16H3V18ZM3 13H21V11H3V13ZM3 6V8H21V6H3Z" fill="black" fill-opacity="0.87" />
    </svg>

    <nav>
        <ul id="primary-navigation" class="primary-navigation flex">
            <li class="not-li">
                <svg class="mobile-nav-close" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.66663 13.9805L13.9803 2.66676" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.9803 13.9803L2.66663 2.66663" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </li>
            <li id="nav_services" class="nav-services">
                <a>Služby
                    <svg class="dropdown-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41 7.84009L12 12.4201L16.59 7.84009L18 9.25009L12 15.2501L6 9.25009L7.41 7.84009Z" />
                    </svg>
                </a>
                <ul class="dropdown-content">
                    <li><a href="<?php echo BASE_URL; ?>vrtne-prace">Vrtné práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li><a href="<?php echo BASE_URL; ?>stavebne-prace">Stavebné práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="desktop"><a href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zemné a výkopové práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="mobile"><a href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zemné a výkop. práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="desktop"><a href="<?php echo BASE_URL; ?>hydraulicka-ruka">Práce s hydraulickou rukou<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="mobile"><a href="<?php echo BASE_URL; ?>hydraulicka-ruka">Práce s hydr. rukou<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>vozovy-park">Vozový park</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>galeria">Galéria</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>referencie">Referencie</a>
            </li>
            <li class="nav-kontakt">
                <a href="<?php echo BASE_URL; ?>kontakt">Kontakt</a>
            </li>
        </ul>
    </nav>
</div>


<div class="header-scrolled flex">
    <div>
        <!--    <a class="header-logo" href="<?php echo BASE_URL; ?>domov">Marpal</a> -->
        <a href="<?php echo BASE_URL; ?>domov">
            <img alt="Marpal logo" class="header-logo" src="<?php echo BASE_URL; ?>assets/image/svgs/logo.svg">
        </a>
    </div>

    <svg class="mobile-nav-open" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 18H21V16H3V18ZM3 13H21V11H3V13ZM3 6V8H21V6H3Z" fill="black" fill-opacity="0.87" />
    </svg>

    <nav>
        <ul class="primary-navigation flex">
            <li>
                <svg class="mobile-nav-close" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.66663 13.9805L13.9803 2.66676" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.9803 13.9803L2.66663 2.66663" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </li>
            <li class="nav-services">
                <a>Služby<svg class="dropdown-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41 7.84009L12 12.4201L16.59 7.84009L18 9.25009L12 15.2501L6 9.25009L7.41 7.84009Z" />
                    </svg></a>
                <ul class="dropdown-content">
                    <li><a href="<?php echo BASE_URL; ?>vrtne-prace">Vrtné práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li><a href="<?php echo BASE_URL; ?>stavebne-prace">Stavebné práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="desktop"><a href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zemné a výkopové práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="mobile"><a href="<?php echo BASE_URL; ?>zemne-vykopove-prace">Zemné a výkop. práce<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="desktop"><a href="<?php echo BASE_URL; ?>hydraulicka-ruka">Práce s hydraulickou rukou<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                    <li class="mobile"><a href="<?php echo BASE_URL; ?>hydraulicka-ruka">Práce s hydr. rukou<svg class="dropdown-icon-content" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.83984 16.59L12.4198 12L7.83984 7.41L9.24984 6L15.2498 12L9.24984 18L7.83984 16.59Z" />
                            </svg>
                        </a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>vozovy-park">Vozový park</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>galeria">Galéria</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>referencie">Referencie</a>
            </li>
            <li class="nav-kontakt">
                <a href="<?php echo BASE_URL; ?>kontakt">Kontakt</a>
            </li>
        </ul>
    </nav>
</div>