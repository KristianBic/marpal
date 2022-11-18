<?php 
  require_once("./theme/include/functions.php");
  require_once("./theme/classes/Database.php");

  $db = new Database();
?>
  <div class="container-fluid py-0">
    <div class="row mt-4 h-100">
      <div class="col-md-12 mb-lg-0 mb-4 ">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-sm-6 col-12 d-flex align-items-center flex-wrap">
                <h4 class="mb-4 gallery-title">Vozový park</h4>
              </div>
              <div class="col-sm-6  col-12 text-sm-end">
                <a class="btn btn--primary mb-0 ml-auto" href="javascript:addGalleryOpen();"><i class="fas fa-plus"></i>&nbsp;&nbsp;Pridať vozidlo</a>
              </div>
            </div>
          </div>
          <?php $vozidla = $db->query("SELECT * FROM vozovypark ORDER BY id DESC"); ?>
          <div class="machine-catalog">
            <div class="machine-catalog-container card-body <?php echo sizeof($vozidla) == 0 ? "empty" : "";?>">
              <?php
              if(sizeof($vozidla) > 0) {
                for ($i=0; $i < sizeof($vozidla); $i++) { ?>
                      <div class="machine-catalog-card ">
                        <span data-delete="<?php echo $vozidla[$i][0]; ?>" class="delete-card">
                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.25 12H14.25V13.5H11.25V12ZM11.25 6H16.5V7.5H11.25V6ZM11.25 9H15.75V10.5H11.25V9ZM2.25 13.5C2.25 14.325 2.925 15 3.75 15H8.25C9.075 15 9.75 14.325 9.75 13.5V6H2.25V13.5ZM10.5 3.75H8.25L7.5 3H4.5L3.75 3.75H1.5V5.25H10.5V3.75Z" fill="white"/>
                          </svg>
                        </span>
                        <a href="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>" data-fslightbox="vozidla" class="overlay"><img src="<?php echo BASE_URL; ?>assets/image/images/vozovypark/<?php echo $vozidla[$i][2]; ?>"/></a>
                        <h4 class="mt-3"><?php echo $vozidla[$i][1]; ?></h4>
                        <p class="mt-1"><?php echo $vozidla[$i][4]; ?></p>
                      </div>
              <?php } } else { ?>
                  <div class="emptyContainer">
                    <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
                    <h3>Žiadne vozidlá.</h3>
                    <p>Ešte ste nepridali žiadne vozidlá.</p>
                  </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-0 addVehicle" id="addVehicle">
    <div class="row mt-4 ">
      <div class="col-md-12 mb-lg-0 mb-4 ">
        <div class="card mt-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h4 class="mb-0 gallery-title">Nový príspevok</h4>
              </div>
              <div class="col-6 text-end">
              <a class="btn btn--secondary mb-0" href="javascript:addGalleryClose();"><i class="fas fa-plus"></i>&nbsp;&nbsp;Zatvoriť</a>
              </div>
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="col-0 d-flex align-items-center">
              <h6 class="mb-0 title-bolder">Názov vozidla</h6>
            </div>
            <div class="err error-title"></div>
          </div>
          <div class="card-body p-3">
            <div class="col-md-6 mb-md-0 mb-4 w-100">
              <input id="title" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Zadajte názov">
             </input>
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="col-0 d-flex align-items-center">
              <h6 class="mb-0 title-bolder">Popis (Volitelné)</h6>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="col-md-6 mb-md-0 mb-4 w-100">
              <input id="popis" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Zadajte popis">
             </input>
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="col-0 d-flex align-items-center">
              <h6 class="mb-0 title-bolder">Nahľadový obrázok</h6>
            </div>
            <div class="err error-img"></div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="previewMainIMG ">
                <p>Momentálne nie sú vybraté žiadne obrázky.</p>
              </div>
              
              <input type="file" id="image_uploads-main" name="filePreview" accept=".jpg, .jpeg, .png" style="width: 0; opacity:0; height:0">
              <div class="col-md-6 mb-md-0 mb-4 w-100">
                <div class="border-radius-lg d-flex align-items-center flex-row w-100"><label for="image_uploads-main" type="button" name="file" href="javascript:;" class="labelBTN border w-100 h-100 m-0 card card-body align-items-center">Prehľadávať...</label></div>
              </div>
             
            </div>
          </div>
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0"></h6>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row ">
              <div class="col-md-2 mb-md-0 mb-4 ">
                <!-- bez slidov dat prec form-switch  a pridat form-check-->
                <div class="form-check form-switch text-nowrap ps-0">
                  <input type="checkbox" id="hydraulika" value="1" class="form-check-input ms-auto"></input>
                  <label class="form-check-label text-body mb-0" for="fb">Zobraziť na podstránke "hydraulická ruka"</label><br>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-md-6 mb-md-0 mb-4 w-100">
                <div class="border-radius-lg d-flex align-items-center flex-row w-100"><button class="sendBtn border w-100 h-100 card card-body align-items-center">Pridať vozidlo</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>