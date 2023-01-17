  <?php
  $prispevky = new IteratorList($db, "Prispevok", "prispevky");
  $prispevky->load();
  $totalCount = $prispevky->getCount();
  $itemsPerPage = 6;
  $pageNumberBtnCount = ceil($totalCount / $itemsPerPage);
  ?>

  <div class="container-fluid py-0">
    <div class="row mt-4 ">
      <div class="col-md-12 mb-lg-0 mb-4 ">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h4 class="mb-0 gallery-title">Príspevky</h4>
              </div>
              <div class="col-6 text-end">
                <a class="btn btn--primary mb-0 ml-auto" href="javascript:addGalleryOpen();"><i class="fas fa-plus"></i>&nbsp;&nbsp;Pridať</a>
              </div>
            </div>
          </div>
          <div class="card-body p-3 mt-4">
            <div class="row pb-3 galContainer" data-currentpage="1" data-totalcount="<?php echo $totalCount; ?>">
              <?php
              $prispevky = new IteratorList($db, "Prispevok", "prispevky");
              $prispevky->load(" ORDER BY id DESC LIMIT $itemsPerPage");
              if ($prispevky->getCount() > 0) {
                while ($prispevok = $prispevky->getNext()) { ?>
                  <div class="col-xl-4 col-sm-6 mb-4 prispevokContainer" data-id="<?php echo $prispevok->getId(); ?>">
                    <div class="post-card border-radius-lg">
                      <span class="update-prispevok">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M3 15H6L14.4697 6.53034C14.7626 6.23745 14.7626 5.76257 14.4697 5.46968L12.5303 3.53034C12.2374 3.23745 11.7626 3.23745 11.4697 3.53034L3 12V15Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M9 6L12 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                      <span class="delete-prispevok">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.25 12H14.25V13.5H11.25V12ZM11.25 6H16.5V7.5H11.25V6ZM11.25 9H15.75V10.5H11.25V9ZM2.25 13.5C2.25 14.325 2.925 15 3.75 15H8.25C9.075 15 9.75 14.325 9.75 13.5V6H2.25V13.5ZM10.5 3.75H8.25L7.5 3H4.5L3.75 3.75H1.5V5.25H10.5V3.75Z" fill="white" />
                        </svg>
                      </span>
                      <h6 class="post-card-title" data-title="titleeee"><?php echo $prispevok->getNadpis(); ?></h6>
                      <div class="post-stats">
                        <div class="post-type gallery-type" style="background-color: <?php echo $prispevok->getFarba(); ?>"><?php echo $prispevok->getTyp(); ?></div>
                        <p class="post-text"><?php echo $prispevok->getDatumPridania(); ?></p>
                        <div class="post-socialNetworks">
                          <?php if (strpos($prispevok->getCielPridania(), "fb") !== false) { ?>
                            <a class="socialNetworks" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Facebook">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1158_27413)">
                                  <path d="M16 8.04902C16 3.60302 12.418 -0.000976562 8.00005 -0.000976562C3.58005 2.34375e-05 -0.00195312 3.60302 -0.00195312 8.05002C-0.00195312 12.067 2.92405 15.397 6.74805 16.001V10.376H4.71805V8.05002H6.75005V6.27502C6.75005 4.25802 7.94505 3.14402 9.77205 3.14402C10.648 3.14402 11.563 3.30102 11.563 3.30102V5.28102H10.554C9.56105 5.28102 9.25105 5.90202 9.25105 6.53902V8.04902H11.469L11.115 10.375H9.25005V16C13.074 15.396 16 12.066 16 8.04902Z" fill="#344767" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_1158_27413">
                                    <rect width="16" height="16" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                          <?php }
                          if (strpos($prispevok->getCielPridania(), "web") !== false) { ?>
                            <a class="socialNetworks" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Webstránka">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7656 5.02053C13.6614 4.99967 13.5833 4.98925 13.5312 4.98925C13.1458 4.98925 12.8125 5.11958 12.5312 5.38025C11.8958 5.09873 11.3021 4.86934 10.75 4.69208C9.84372 4.40013 8.89581 4.16031 7.90623 3.97263C7.81248 3.72239 7.67185 3.51385 7.48435 3.34702C7.74477 2.11665 8.09373 1.00098 8.53123 0C9.84372 0.0938416 11.0494 0.474422 12.1484 1.14174C13.2474 1.80906 14.1354 2.68491 14.8125 3.76931C14.427 4.18638 14.0781 4.60345 13.7656 5.02053ZM6.51561 2.98729C6.24477 2.98729 5.98957 3.06028 5.74998 3.20626C4.90624 2.58065 4.05728 2.04888 3.20312 1.61095C4.49478 0.630824 5.94269 0.0938416 7.54685 0C7.1406 0.907136 6.81248 1.9029 6.56248 2.98729H6.51561ZM1.09375 3.95699C1.44791 3.36266 1.89583 2.79961 2.43749 2.26784C3.14582 2.63278 3.8802 3.08113 4.64061 3.6129C3.29687 3.58162 2.11458 3.69632 1.09375 3.95699ZM5.01561 4.5826C5.03644 4.90583 5.14842 5.18996 5.35155 5.435C5.55467 5.68003 5.80727 5.84425 6.10936 5.92766C6.04686 6.65754 6.01561 7.35093 6.01561 8.00782C6.01561 8.4666 6.03123 8.99316 6.06248 9.58749C5.83332 9.66048 5.63019 9.7856 5.45311 9.96285C4.89061 9.74389 4.34895 9.49365 3.82811 9.21212C3.9427 8.98273 3.99999 8.74813 3.99999 8.50831C3.99999 8.09124 3.85416 7.73672 3.56249 7.44477C3.27082 7.15282 2.91666 7.00684 2.49999 7.00684C2.04166 7.00684 1.66145 7.1841 1.35937 7.53861C0.921872 7.14239 0.531248 6.73053 0.187499 6.30303C0.281249 5.85468 0.421874 5.41153 0.609373 4.97361C1.8802 4.61909 3.34895 4.48876 5.01561 4.5826ZM1.01562 8.63343C1.04687 9.01922 1.20573 9.34506 1.49218 9.61095C1.77864 9.87683 2.11458 10.0098 2.49999 10.0098C2.61458 10.0098 2.73958 9.98892 2.87499 9.94721C3.54166 10.333 4.2552 10.6667 5.01561 10.9482V11.0108C5.01561 11.4174 5.15363 11.7641 5.42967 12.0508C5.70571 12.3376 6.04686 12.4914 6.45311 12.5122C6.71352 13.7843 7.0781 14.9469 7.54685 16C6.50519 15.9374 5.52082 15.6846 4.59374 15.2414C3.66666 14.7983 2.86718 14.2222 2.19531 13.5132C1.52343 12.8042 0.989581 11.97 0.593748 11.0108C0.197916 10.0515 0 9.0505 0 8.00782C0 7.99739 0.00520832 7.85663 0.015625 7.58553C0.307291 7.95047 0.640623 8.29977 1.01562 8.63343ZM7.8281 11.7146C8.5781 11.8501 9.33331 11.9387 10.0937 11.9804C10.1666 12.189 10.2812 12.3819 10.4375 12.5591C10.1979 13.654 10.0521 14.7175 9.99997 15.7498C9.46872 15.8853 8.97914 15.9687 8.53123 16C8.04164 14.8843 7.66144 13.6227 7.3906 12.2151C7.5781 12.0899 7.72394 11.9231 7.8281 11.7146ZM12.6718 12.4653C12.8073 12.2985 12.901 12.1212 12.9531 11.9335C13.7135 11.871 14.4479 11.7719 15.1562 11.6364C14.6562 12.6165 13.9687 13.4663 13.0937 14.1857C13 13.6435 12.8593 13.0701 12.6718 12.4653ZM10.125 10.9795C9.39581 10.9378 8.67706 10.8439 7.96873 10.6979C7.85414 10.1766 7.55727 9.81688 7.0781 9.61877C7.03644 9.00358 7.0156 8.4666 7.0156 8.00782C7.0156 7.31965 7.04685 6.60541 7.10935 5.8651C7.13019 5.8651 7.15623 5.85468 7.18748 5.83382C7.21873 5.81297 7.23956 5.80254 7.24998 5.80254C7.65623 6.19876 8.01039 6.5637 8.31248 6.89736C9.21872 7.89834 9.98955 9.03486 10.625 10.3069C10.3958 10.4842 10.2291 10.7084 10.125 10.9795ZM11.5156 13.0127C11.5364 13.0127 11.5937 13.0075 11.6875 12.9971C11.8645 13.6331 11.9948 14.2639 12.0781 14.8895C11.776 15.0668 11.4114 15.2441 10.9843 15.4213C11.0573 14.608 11.1823 13.7999 11.3593 12.9971C11.4427 13.0075 11.4948 13.0127 11.5156 13.0127ZM11.4375 9.27468C11.4271 9.29554 11.414 9.32682 11.3984 9.36852C11.3828 9.41023 11.3698 9.44151 11.3593 9.46237C10.7031 8.2737 9.93226 7.19453 9.04685 6.22483C8.72393 5.85989 8.33852 5.46367 7.8906 5.03617C7.90102 5.03617 7.90883 5.02835 7.91404 5.01271L7.92185 4.98925C8.79685 5.1665 9.63539 5.38547 10.4375 5.64614C10.9271 5.80254 11.4635 6.01108 12.0468 6.27175C12.026 6.37602 12.0156 6.45422 12.0156 6.50635C12.0156 6.81916 12.1093 7.1059 12.2968 7.36657C11.9531 8.02346 11.6666 8.6595 11.4375 9.27468ZM12.1718 10.1818C12.2968 9.81688 12.3593 9.6292 12.3593 9.61877C12.5677 9.09743 12.8281 8.53959 13.1406 7.94526C13.276 7.98697 13.4062 8.00782 13.5312 8.00782C13.8854 8.00782 14.2031 7.88791 14.4843 7.64809C14.9947 8.00261 15.4947 8.39883 15.9843 8.83675C15.9218 9.43108 15.7968 10.0046 15.6093 10.5572C14.7552 10.7344 13.8541 10.8596 12.9062 10.9326C12.7708 10.5989 12.526 10.3486 12.1718 10.1818ZM15.0312 6.49071C15.0312 6.14663 14.9166 5.83382 14.6875 5.5523C14.9062 5.27077 15.125 5.01531 15.3437 4.78592C15.7187 5.64093 15.9375 6.52199 16 7.42913C15.6562 7.16846 15.3229 6.93385 15 6.72532C15.0208 6.63148 15.0312 6.55327 15.0312 6.49071Z" fill="#344767" />
                              </svg>
                            </a>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="post-content <?php if (strlen($prispevok->getPopis()) > 50) echo "more"; ?>">
                        <div class="content">
                          <p class="post-text"><?php echo trim(html_cut($prispevok->getPopis(), 50)); ?></p>
                        </div>
                        <?php if (strlen($prispevok->getPopis()) > 50) { ?>
                          <div class="showMorePopis moreBtn">Zobraz všetko</div>
                        <?php } ?>
                      </div>
                      <?php if (sizeof($prispevok->getObrazky()) > 0) { ?>
                        <h6 class="post-card-subtitle">Pridané fotky a videá</h6>
                        <div class="post-images <?php if (sizeof($prispevok->getObrazky()) > 4) echo "more" ?>">
                          <?php foreach ($prispevok->getObrazky() as $obrazok) {
                            if (strpos($obrazok, ".mp4") !== false) { ?>
                              <div class="overlay">
                                <a href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>">
                                  <video preload="metadata">
                                    <source src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" type="video/mp4">
                                  </video>
                                </a>
                              </div>
                            <?php } else { ?>
                              <div class="overlay">
                                <a href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>">
                                  <img alt="prispevok" src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>">
                                </a>
                              </div>
                            <?php } ?>
                          <?php } ?>
                        </div>
                        <?php if (sizeof($prispevok->getObrazky()) > 4) { ?>
                          <div class="showMoreMedia moreBtn">Zobraz všetko</div>
                      <?php }
                      } ?>
                    </div>
                  </div>
                <?php }
                if ($totalCount > $itemsPerPage) { ?>
                  <div class="pagination">
                    <?php echo getTablePagination($pageNumberBtnCount); ?>
                  </div>
                <?php }
              } else { ?>
                <div class="emptyContainer">
                  <img alt="noImg" src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
                  <h3>Žiadne príspevky.</h3>
                  <p>Neevidujeme žiadne pridané príspevky.</p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container-fluid py-0 addGalery" id="addGaleryO">
    <div class="row mt-4 ">
      <div class="col-md-12 mb-lg-0 mb-4 ">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h4 class="mb-0 gallery-title">Nový príspevok</h4>
              </div>
              <div class="col-6 text-end">
                <a class="btn btn--secondary mb-0 ml-auto" href="javascript:addGalleryClose();"><i class="fas fa-plus"></i>&nbsp;&nbsp;Zatvoriť</a>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0 title-bolder">Typ príspevku</h6>
                </div>

                <div class="col-md-0 mb-md-0 mb-4 pt-3">
                  <select id="typ" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100">
                    <option value="text" selected>Text</option>
                    <option value="galeria">Galéria fotiek</option>
                    <option value="medium">Samostatné video alebo fotka</option>
                  </select>
                  <div class="err"></div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0 title-bolder">Nadpis (Len pre WEB)</h6>
                </div>

                <div class="col-md-0 pt-3">
                  <input id="nadpis" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Nadpis">
                  <div class="err nadpisError"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="col-0 d-flex align-items-center">
              <h6 class="mb-0 title-bolder">Popis (Len pre FB a IG | Nepovinné)</h6>
            </div>
            <div class="err popisError"></div>
          </div>

          <div class="card-body p-3">
            <div class="row">
              <div class="col-md-6 mb-md-0 mb-4 w-100">
                <textarea id="popis" placeholder="Popis"></textarea>
              </div>
            </div>
          </div>
          <div class="nahladInputContainer" style="display: none">
            <div class="card-header pb-0 p-3">
              <div class="col-0 d-flex align-items-center">
                <h6 class="mb-0 title-bolder">Nahľadový obrázok</h6>
              </div>
              <div class="err nahladError"></div>
            </div>

            <div class="card-body p-3">
              <div class="row">
                <div class="previewMainIMG ">
                  <p>Momentálne nie sú vybraté žiadne média.</p>
                </div>
                <input type="file" id="nahlad" name="file" accept=".jpg, .jpeg, .png" style="width: 0; opacity:0; height:0">
                <div class="col-md-6 mb-md-0 mb-4 w-100">
                  <div class="border-radius-lg d-flex align-items-center flex-row w-100"><label for="nahlad" class="labelBTN border w-100 h-100 m-0 card card-body align-items-center">+ Pridaj médium</label></div>
                </div>
              </div>
            </div>
          </div>

          <div class="galeriaInputContainer" style="display: none">
            <div class="card-header pb-0 p-3">
              <div class="col-0 d-flex align-items-center">
                <h6 class="mb-0 title-bolder">Fotky</h6>
              </div>
              <div class="err galeriaError"></div>
            </div>

            <div class="card-body p-3">
              <div class="row">
                <div class="preview ">
                  <p>Momentálne nie sú vybrané žiadne média.</p>
                </div>
                <input multiple type="file" id="galeria" name="galeria[]" accept=".jpg, .jpeg, .png" style="width: 0; opacity:0; height:0">
                <div class="col-md-6 mb-md-0 mb-4 w-100">
                  <div class=" border-radius-lg d-flex align-items-center flex-row w-100"> <label class="labelBTN border w-100 h-100 m-0 card card-body align-items-center " for="galeria">+ Pridaj obrázky do galérie</label></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="col-0 d-flex align-items-center">
              <h6 class="mb-0 title-bolder">Kde všade chcete pridať tento príspevok?</h6>
            </div>
            <div class="err cielError"></div>
          </div>

          <div class="card-body p-3">
            <div class="row gx-0">
              <div class="col-md-2 mb-md-0 mb-4 ">
                <!-- bez slidov dat prec form-switch  a pridat form-check-->
                <div class="form-check form-switch ps-0">
                  <input disabled="disabled" type="checkbox" id="fb" name="ciel[]" value="fb" class="form-check-input ms-auto">
                  <label class="form-check-label text-body text-truncate mb-0" for="fb">Facebook</label><br>
                </div>
              </div>
              <div class="col-md-2 mb-md-0 mb-4">
                <!-- bez slidov dat prec form-switch -->
                <div class="form-check form-switch ps-0">
                  <input id="webCHB" type="checkbox" name="ciel[]" value="web" class="form-check-input ms-auto">
                  <label class="form-check-label text-body text-truncate mb-0" for="webCHB">Webstránka</label><br>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-md-6 mb-md-0 mb-4 w-100">
                <div class=" border-radius-lg d-flex align-items-center flex-row w-100"><button class="addPostBtn sendBtn border w-100 h-100 card card-body align-items-center ">Pridať príspevok</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>