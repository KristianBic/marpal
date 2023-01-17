<?php

require_once("../include/functions.php");
require_once("../classes/Database.php");
require_once("../classes/Prispevok.php");

$db = new Database();

$currentPage = validation($_POST['page']);
$miesto = $_POST['miesto'];
$totalCount = validation($_POST['totalcount']);
$itemsPerPage = 8;

$offset = $itemsPerPage * ($currentPage - 1);
$pageNumberBtnCount = ceil($totalCount / $itemsPerPage);
if ($miesto == "www") {
  $prispevky = new IteratorList($db, "Prispevok", "prispevky");
  $prispevky->load(" WHERE ciel_pridania LIKE '%web%' AND typ IN ('galeria','medium') ORDER BY id DESC LIMIT $itemsPerPage OFFSET $offset");
  if ($prispevky->getCount() > 0) {
?>
    <div class="gallery-card-container">
      <?php while ($prispevok = $prispevky->getNext()) {
        if (($prispevok->getObrazky()) > 0) { ?>
          <div class="gallery-card">
            <?php foreach ($prispevok->getObrazky() as $obrazok) { ?>
              <a style="display: none" href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>"></a>
            <?php } ?>
            <a href="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" data-fslightbox="<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>">
              <?php if (strpos($prispevok->getNahlad(), ".mp4") !== false) { ?>
                <video preload="metadata" autoplay>
                  <source src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" type="video/mp4">
                </video>
              <?php } else { ?>
                <img src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $prispevok->getNahlad(); ?>" />
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
      <?php }
      } ?>
    </div>
    <?php if ($totalCount > 1) { ?>
      <div class="pagination">
        <?php echo getTablePagination($pageNumberBtnCount, $currentPage); ?>
      </div>
    <?php }
  } else { ?>
    <div class="emptyContainer">
      <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
      <h3>Žiadne galérie.</h3>
      <p>Zatiaľ sme nepridali žiadny záznam z nášho umenia, ale zostaňte nablízku, čoskoro pridáme!</p>
    </div>
  <?php } ?>
  <?php } else {
  $prispevky = new IteratorList($db, "Prispevok", "prispevky");
  $prispevky->load(" ORDER BY id DESC LIMIT $itemsPerPage OFFSET $offset");
  if ($prispevky->getCount() > 0) {
    while ($prispevok = $prispevky->getNext()) { ?>
      <div class="col-xl-4 col-sm-6 mb-4 prispevokContainer" data-id="<?php echo $prispevok->getId(); ?>">
        <div class="post-card border-radius-lg">
          <h6 class="post-card-title"><?php echo $prispevok->getNadpis(); ?></h6>
          <div class="post-stats">
            <div class="post-type gallery-type" style="--farba: <?php echo $prispevok->getFarba(); ?>"><?php echo $prispevok->getTyp(); ?></div>
            <p class="post-text"><?php echo $prispevok->getDatumPridania(); ?></p>
            <div class="post-socialNetworks">
              <?php if (strpos($prispevok->getCielPridania(), "ig") !== false) { ?>
                <a class="socialNetworks" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Instagram">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.97602 0.710748C5.75802 0.674748 6.00735 0.666748 7.99935 0.666748C9.99135 0.666748 10.2407 0.675415 11.022 0.710748C11.8033 0.746081 12.3367 0.870748 12.8033 1.05141C13.292 1.23608 13.7353 1.52475 14.102 1.89808C14.4753 2.26408 14.7633 2.70675 14.9473 3.19608C15.1287 3.66275 15.2527 4.19608 15.2887 4.97608C15.3247 5.75941 15.3327 6.00875 15.3327 8.00008C15.3327 9.99208 15.324 10.2414 15.2887 11.0234C15.2533 11.8034 15.1287 12.3367 14.9473 12.8034C14.7633 13.2928 14.4749 13.7362 14.102 14.1027C13.7353 14.4761 13.292 14.7641 12.8033 14.9481C12.3367 15.1294 11.8033 15.2534 11.0233 15.2894C10.2407 15.3254 9.99135 15.3334 7.99935 15.3334C6.00735 15.3334 5.75802 15.3247 4.97602 15.2894C4.19602 15.2541 3.66268 15.1294 3.19602 14.9481C2.70663 14.7641 2.26323 14.4756 1.89668 14.1027C1.5236 13.7365 1.23489 13.2933 1.05068 12.8041C0.870016 12.3374 0.746016 11.8041 0.710016 11.0241C0.674016 10.2407 0.666016 9.99141 0.666016 8.00008C0.666016 6.00808 0.674682 5.75875 0.710016 4.97741C0.745349 4.19608 0.870016 3.66275 1.05068 3.19608C1.23516 2.7068 1.52409 2.26362 1.89735 1.89741C2.26338 1.52442 2.70633 1.23571 3.19535 1.05141C3.66202 0.870748 4.19535 0.746748 4.97535 0.710748H4.97602ZM10.9627 2.03075C10.1893 1.99541 9.95735 1.98808 7.99935 1.98808C6.04135 1.98808 5.80935 1.99541 5.03602 2.03075C4.32068 2.06341 3.93268 2.18275 3.67402 2.28341C3.33202 2.41675 3.08735 2.57475 2.83068 2.83141C2.58738 3.06812 2.40014 3.35627 2.28268 3.67475C2.18202 3.93341 2.06268 4.32141 2.03002 5.03675C1.99468 5.81008 1.98735 6.04208 1.98735 8.00008C1.98735 9.95808 1.99468 10.1901 2.03002 10.9634C2.06268 11.6787 2.18202 12.0667 2.28268 12.3254C2.40002 12.6434 2.58735 12.9321 2.83068 13.1687C3.06735 13.4121 3.35602 13.5994 3.67402 13.7167C3.93268 13.8174 4.32068 13.9367 5.03602 13.9694C5.80935 14.0047 6.04068 14.0121 7.99935 14.0121C9.95802 14.0121 10.1893 14.0047 10.9627 13.9694C11.678 13.9367 12.066 13.8174 12.3247 13.7167C12.6667 13.5834 12.9113 13.4254 13.168 13.1687C13.4113 12.9321 13.5987 12.6434 13.716 12.3254C13.8167 12.0667 13.936 11.6787 13.9687 10.9634C14.004 10.1901 14.0113 9.95808 14.0113 8.00008C14.0113 6.04208 14.004 5.81008 13.9687 5.03675C13.936 4.32141 13.8167 3.93341 13.716 3.67475C13.5827 3.33275 13.4247 3.08808 13.168 2.83141C12.9313 2.58813 12.6432 2.40089 12.3247 2.28341C12.066 2.18275 11.678 2.06341 10.9627 2.03075ZM7.06268 10.2607C7.58579 10.4785 8.16827 10.5079 8.71063 10.3439C9.253 10.1799 9.72161 9.83269 10.0364 9.36158C10.3512 8.89046 10.4927 8.32466 10.4367 7.76082C10.3807 7.19697 10.1307 6.67006 9.72935 6.27008C9.47351 6.0144 9.16416 5.81862 8.82357 5.69685C8.48298 5.57507 8.11963 5.53032 7.75968 5.56582C7.39972 5.60133 7.05212 5.7162 6.74188 5.90217C6.43165 6.08814 6.16651 6.34058 5.96555 6.64131C5.76459 6.94205 5.63281 7.28361 5.57969 7.64139C5.52658 7.99917 5.55345 8.36428 5.65838 8.71043C5.7633 9.05657 5.94367 9.37515 6.1865 9.64323C6.42932 9.9113 6.72857 10.1222 7.06268 10.2607ZM5.33402 5.33475C5.68403 4.98473 6.09956 4.70708 6.55688 4.51766C7.0142 4.32823 7.50435 4.23073 7.99935 4.23073C8.49435 4.23073 8.9845 4.32823 9.44182 4.51766C9.89913 4.70708 10.3147 4.98473 10.6647 5.33475C11.0147 5.68476 11.2923 6.10029 11.4818 6.55761C11.6712 7.01493 11.7687 7.50508 11.7687 8.00008C11.7687 8.49508 11.6712 8.98523 11.4818 9.44255C11.2923 9.89987 11.0147 10.3154 10.6647 10.6654C9.95779 11.3723 8.99904 11.7694 7.99935 11.7694C6.99965 11.7694 6.04091 11.3723 5.33402 10.6654C4.62713 9.95852 4.23 8.99977 4.23 8.00008C4.23 7.00039 4.62713 6.04164 5.33402 5.33475ZM12.6047 4.79208C12.6914 4.71026 12.7609 4.61187 12.8089 4.50273C12.8569 4.39359 12.8826 4.27593 12.8843 4.1567C12.886 4.03748 12.8638 3.91911 12.819 3.80862C12.7742 3.69813 12.7076 3.59775 12.6233 3.51344C12.539 3.42913 12.4386 3.36259 12.3281 3.31776C12.2177 3.27293 12.0993 3.25073 11.9801 3.25247C11.8608 3.25421 11.7432 3.27985 11.634 3.32788C11.5249 3.37591 11.4265 3.44534 11.3447 3.53208C11.1856 3.70077 11.0984 3.92483 11.1018 4.1567C11.1052 4.38857 11.1988 4.61 11.3628 4.77398C11.5268 4.93795 11.7482 5.03157 11.9801 5.03495C12.2119 5.03833 12.436 4.95121 12.6047 4.79208Z" fill="#344767" />
                  </svg>
                </a>
              <?php }
              if (strpos($prispevok->getCielPridania(), "fb") !== false) { ?>
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
                      <img src="<?php echo BASE_URL; ?>assets/image/images/galerie/<?php echo $prispevok->getNadpis() . "_" . $prispevok->getDatumPridania("dmY_His"); ?>/<?php echo $obrazok; ?>" />
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
        <?php echo getTablePagination($pageNumberBtnCount, $currentPage); ?>
      </div>
    <?php }
  } else { ?>
    <div class="emptyContainer">
      <img src="<?php echo BASE_URL; ?>assets/image/icons/noImages.svg">
      <h3>Žiadne príspevky.</h3>
      <p>Neevidujeme žiadne pridané príspevky.</p>
    </div>
<?php }
} ?>