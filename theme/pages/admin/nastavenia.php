<div class="container-fluid py-0 kontaktInfo" id="kontaktInfo">
  <div class="row mt-4 ">
    <div class="col-md-12 mb-lg-0 mb-4 ">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h4 class="mb-0 gallery-title text-nowrap">Kontaktné informácie</h4>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Sídlo firmy</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="sidlo" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Adresa sídla" value="<?php $item = new KontaktInfo($db, -1, "sidlo"); echo $item->getHodnota(); ?>">
                <div class="err sidloError"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Korešpondenčná adresa</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="korAdresa" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Kor. adresa" value="<?php $item = new KontaktInfo($db, -1, "korAdresa"); echo $item->getHodnota(); ?>">
                <div class="err korAdresaError"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">IBAN</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="iban" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="IBAN" value="<?php $item = new KontaktInfo($db, -1, "iban"); echo $item->getHodnota(); ?>">
                <div class="err ibanError"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-3 pt-0">
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Konateľ firmy</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="konatel" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="Meno a priezvisko" value="<?php $item = new KontaktInfo($db, -1, "konatel"); echo $item->getHodnota(); ?>">
                <div class="err konatelError"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">IČO</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="ico" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="IČO" value="<?php $item = new KontaktInfo($db, -1, "ico"); echo $item->getHodnota(); ?>">
                <div class="err icoError"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">IČ DPH</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input id="icdph" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 " placeholder="IČDPH" value="<?php $item = new KontaktInfo($db, -1, "icdph"); echo $item->getHodnota(); ?>">
                <div class="err icdphError"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-6 mb-md-0 mb-4 w-100">
              <div class="border-radius-lg d-flex align-items-center flex-row w-100"><button class="saveContactInfoBtn sendBtn border w-100 h-100 card card-body align-items-center ">Uložiť kontaktné informácie</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>









<div class="container-fluid py-0 changePass" id="changePass">
  <div class="row mt-4 ">
    <div class="col-md-12 mb-lg-0 mb-4 ">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h4 class="mb-0 gallery-title">Zmena hesla</h4>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Aktuálne heslo</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input type="password" id="oldPass" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100">
                <div class="err oldPassError"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Nové heslo</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input type="password" id="newPass1" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100">
                <div class="err newPass1Error"></div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-bolder text-nowrap">Zopakuj heslo</h6>
              </div>
              <div class="col-md-0 pt-3">
                <input type="password" id="newPass2" class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row w-100 ">
                <div class="err newPass2Error"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-6 mb-md-0 mb-4 w-100">
              <div class=" border-radius-lg d-flex align-items-center flex-row w-100"><button class="changePassBtn sendBtn border w-100 h-100 card card-body align-items-center ">Zmeniť heslo</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>