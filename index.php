<?php
require_once("config.php");
require_once("./theme/classes/Database.php");
require_once("./theme/include/functions.php");
require_once("./theme/classes/Helper.php");
require_once("./theme/classes/IteratorList.php");

session_start();

$db = new Database();
$helper = new Helper($db);
$isAdminPage = false;
if (isset($_GET['param']) && $_GET['param'] != "/" && !empty($_GET['param'])) {
    $param = substr(validation($_GET['param']), 1);
    $param = explode("/", $param);
} else {
    $param = null;
}
if (!isset($_GET['url'])) {
    $page = "domov";
} else {
    if (!file_exists("./theme/pages/" . $_GET['url'] . ".php") && $_GET['url'] != "admin") {
        $page = "domov";
    } else {
        if ($_GET['url'] == "admin") {
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']->isValid()) {
                $isAdminPage = true;
                if (file_exists("./theme/pages/admin/" . $param[0] . ".php")) {
                    $page = $param[0];
                } else {
                    $page = "galeria";
                }
            } else {
                $page = "login";
            }
        } else {
            $page = validation($_GET['url']);
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']->isValid() && $page == "login") {
                $page = "domov";
            }
        }
    }
}
/* var_dump($param);
print_r($param); */
if ($isAdminPage) { ?>

    <!DOCTYPE html>
    <html lang="sk">

    <head>
        <meta name="robots" content="noindex" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Marpal admin</title>
        <?php require_once("theme/include/links_admin.php"); ?>
    </head>

    <body class="g-sidenav-show  bg-gray-100">
        <div class="d-none" id="base_url" data-base_url="<?php echo BASE_URL; ?>"></div>
        <div class="d-none" id="sid" data-sid="<?php echo session_id(); ?>"></div>
        <?php require_once("theme/include/aside_admin.php"); ?>
        <main class="main-content position-relative min-height-vh-100 mt-1 border-radius-lg ">
            <?php require_once("theme/include/navbar_admin.php"); ?>
            <?php require_once("theme/pages/admin/" . $page . ".php"); ?>
        </main>
    </body>
    <?php require_once("theme/include/scripts_admin.php"); ?>

    </html>

<?php } else {
    $pageData = $db->query("SELECT * FROM page_data WHERE page LIKE '$page'");
    if (!empty($pageData)) {
        $pageTitle = $pageData[0][2];
        $pageDescription = $pageData[0][3];
    } else {
        $pageTitle = "Marpal.eu";
        $pageDescription = "Firma sa zameriava na vrty pre tepelné čerpadlá, geologické, prieskumné odvodňovacie a stavebné vrty. Taktiež ponúka všetky druhy stavebných a výkopových prác.";
    }
?>

    <!DOCTYPE html>
    <html lang="sk">

    <head>
        <meta name="google-site-verification" content="6xxrM04zslTouuWew5gHISq1Zhw7rfaToAlCRFRrJag" />
        <meta name="facebook-domain-verification" content="c7b3pfoxbmfghce9owz870mq6kvmh9" />
        <?php if ($page == "login") { ?>
            <meta name="robots" content="noindex" />
        <?php } else { ?>
            <meta name=”robots” content="index, follow">
        <?php } ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $pageDescription; ?>">
        <meta name="keywords" content="vrtaniestudni.eu, marpal.eu, vŕtanie studní, vrtanie studni, stavebne prace, kysucke nove mesto, stavebne prace knm a okolie, stavba rodinných domov, stavebné vrty, geologické vrty, hydraulická ruka, zemné a výkopové práce, pavol kubala">
        <meta name="author" content="Michal Čečko">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>assets/image/icons/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>assets/image/icons/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL; ?>assets/image/icons/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo BASE_URL; ?>assets/image/icons/favicon/site.webmanifest">
        <title><?php echo $pageTitle; ?></title>
        <?php require_once("theme/include/links.php"); ?>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    </head>

    <body>
        <div class="d-none" id="base_url" data-base_url="<?php echo BASE_URL; ?>"></div>
        <div class="d-none" id="sid" data-sid="<?php echo session_id(); ?>"></div>
        <?php require_once("theme/include/loader.php"); ?>
        <!-- podminku na admina -->
        <?php if ($page != "login" && $page != "admin") {
            require_once("theme/include/header.php");
        } ?>

        <div class="wrapper">
            <?php require_once("theme/pages/" . $page . ".php"); ?>
        </div>

        <?php if ($page != "login" && $page != "admin") {
            require_once("theme/include/footer.php");
        } ?>

        <?php require_once("theme/include/scripts.php"); ?>
    </body>

    </html>

<?php } ?>