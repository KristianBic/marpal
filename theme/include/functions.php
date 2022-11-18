<?php
if (strpos(getcwd(), "ajax") !== false) {
    require_once("../../config.php");
} else {
    require_once("./config.php");
}
/* function newLog($db, $contents)
{
    $db->query("INSERT INTO log (contents, dateCreated) VALUES (?, ?)", array($contents, date("Y-m-d H:i:s")));
} */

/* function encrypt($str)
{
    $encryptionKey = base64_decode(AES_KEY);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
    $encrypted = openssl_encrypt($str, "aes-256-cbc", $encryptionKey, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt($str)
{
    $encryptionKey = base64_decode(AES_KEY);
    list($encryptedData, $iv) = array_pad(explode("::", base64_decode($str), 2), 2, null);
    return openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);
}
 */

function rrmdir($dir) { 
    if (is_dir($dir)) { 
      $objects = scandir($dir);
      foreach ($objects as $object) { 
        if ($object != "." && $object != "..") { 
          if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
            rrmdir($dir. DIRECTORY_SEPARATOR .$object);
          else
            unlink($dir. DIRECTORY_SEPARATOR .$object); 
        } 
      }
      rmdir($dir); 
    } 
  }

  
function validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function html_cut($text, $max_length)
{
    $tags   = array();
    $result = "";

    $is_open   = false;
    $grab_open = false;
    $is_close  = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";

    $i = 0;
    $stripped = 0;

    $stripped_text = strip_tags($text);

    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
    {
        $symbol  = $text[$i];
        $result .= $symbol;

        switch ($symbol)
        {
           case '<':
                $is_open   = true;
                $grab_open = true;
                break;

           case '"':
               if ($in_double_quotes)
                   $in_double_quotes = false;
               else
                   $in_double_quotes = true;

            break;

            case "'":
              if ($in_single_quotes)
                  $in_single_quotes = false;
              else
                  $in_single_quotes = true;

            break;

            case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes)
                {
                    $is_close  = true;
                    $is_open   = false;
                    $grab_open = false;
                }

                break;

            case ' ':
                if ($is_open)
                    $grab_open = false;
                else
                    $stripped++;

                break;

            case '>':
                if ($is_open)
                {
                    $is_open   = false;
                    $grab_open = false;
                    array_push($tags, $tag);
                    $tag = "";
                }
                else if ($is_close)
                {
                    $is_close = false;
                    array_pop($tags);
                    $tag = "";
                }

                break;

            default:
                if ($grab_open || $is_close)
                    $tag .= $symbol;

                if (!$is_open && !$is_close)
                    $stripped++;
        }

        $i++;
    }

    while ($tags)
        $result .= "</".array_pop($tags).">";

    return $result;
}

function getHoursFormat($time, $stringyFormat = false){
    if(explode(":", $time) > 2){
        $time = round($time);
    }
    $HH_MM = sprintf('%2d:%02d', (int) $time, round(fmod($time, 1) * 60));
    if($stringyFormat){
        $exploded = explode(":", $HH_MM);
        if($exploded[1] == 0){
            return intval($exploded[0])."h";
        }
        return intval($exploded[0])."h ".intval($exploded[1])."m";
    }
    return $HH_MM;
}

function getWorkDuration($start, $end){
    $time1 = strtotime($start);
    $time2 = strtotime($end);
    $difference = round(abs($time2 - $time1) / 3600,2);
    if($difference > 10){
        $hoursOverWorktime = $difference - 10;
        $difference = 10;
        return getHoursFormat($difference, true)." + ".getHoursFormat($hoursOverWorktime, true);
    }
    return getHoursFormat($difference, true);
}

function getWeekFromDate($date){
    $dateForGettingWeek = new DateTime($date);
    return $dateForGettingWeek->format("W");
}

function getYearFromDate($date){
    return date("Y", strtotime($date));
}

function getDayNameFromDate($date, $lang = "en") {
    $day = date('l', strtotime($date));
    switch ($lang) {
        case 'de':
            switch ($day) {
                case 'Monday':
                    return "Montag";                
                case 'Tuesday':
                    return "Dienstag";                
                case 'Wednesday':
                    return "Mittwoch";                
                case 'Thursday':
                    return "Donnerstag";                
                case 'Friday':
                    return "Freitag";                
                case 'Saturday':
                    return "Samstag";                              
                default:
                    return "Sonntag";
            }
            break;
        case 'sk':
            switch ($day) {
                case 'Monday':
                    return "Pondelok";                
                case 'Tuesday':
                    return "Utorok";                
                case 'Wednesday':
                    return "Streda";                
                case 'Thursday':
                    return "Štvrtok";               
                case 'Friday':
                    return "Piatok";                
                case 'Saturday':
                    return "Sobota";                              
                default:
                    return "Nedeľa";
            }
            break;
    }
    return $day;
}

function friendly_string($string, $separator = "-")
{

    setlocale(LC_ALL, 'slovak');
    $string = iconv("utf-8", "us-ascii//TRANSLIT", $string);
    $string = lowercase($string);
    $string = trim($string, "$separator");
    $string = str_replace(' ', '-', $string);
    $string = preg_replace('/[^a-zA-Z0-9-_\/]/', '', $string);
    $string = preg_replace('~[^-a-z0-9_]+~', '', $string);

    return $string;
}


function lowercase($string)
{
    if (function_exists('mb_strtolower')) {
        return mb_strtolower($string, 'UTF-8');
    } else {
        return strtolower($string);
    }
}

function compressImage($image, $compresspath, $quality, $width)
    /*** Vytvorenie thumbnailu ***/
{

    $error = true;
    if (!file_exists($image)) {
        /** kontrola obrázka */
        $error = "Súbor neexistuje";  //1
    } else {
        list($width_orig, $height_orig, $image_type) = getimagesize($image);
        /*** zisti info o obrázku ***/

        if ($width_orig < 120) {
            /** zisti či je obrázok menší ako požadovaná veľkosť **/
            $error = "Chyba, obrázok je príliš malý"; //2
        } else {
            if ($width_orig == 120) {

                if ($image_type == 3) {
                    /** Zisti či je obrázok .png**/
                    $quality = ($quality / 10);
                    $image = imagecreatefrompng($image);
                    imagealphablending($image, false);
                    if (!is_writeable(dirname($compresspath))) {
                        /*** zapíš súbor na disk ***/
                        $error = "Nebodarilo sa nahrať obrázok"; //3
                    } else {
                        imagesavealpha($image, true);
                        imagepng($image, $compresspath, $quality);
                    }
                } else if ($image_type == 2) {
                    /** zisti či je obrázok jpeg */
                    $image = imagecreatefromjpeg($image);
                    if (!is_writeable(dirname($compresspath))) {
                        /*** zapíš súbor na disk ***/
                        $error = "Nebodarilo sa nahrať obrázok_4";  //4
                    } else {
                        imagejpeg($image, $compresspath, $quality);
                    }
                } else {
                    $error = "Nepodporovaný formát"; //8
                }
            } else {
                if ($image_type == 3) {
                    /*** skontroluj ci .png ***/
                    $quality = ($quality / 10);
                    $height = (int)(($width / $width_orig) * $height_orig);
                    /*** zachovaj pomer strán ***/

                    /*** prevzorkuj obrázok ***/
                    $image_p = imagecreatetruecolor($width, $height);
                    $image = imagecreatefrompng($image);
                    imagealphablending($image, false);
                    imagealphablending($image_p, false);


                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);


                    if (!is_writeable(dirname($compresspath))) {
                        /*** zapíš súbor na disk ***/
                        $error = "Nebodarilo sa nahrať obrázok"; // 5
                    } else {
                        imagesavealpha($image, true);
                        imagesavealpha($image_p, true);
                        imagepng($image_p, $compresspath, $quality);
                    }
                } else if ($image_type == 2) {
                    /*** skontroluj ci .jpeg ***/
                    $height = (int)(($width / $width_orig) * $height_orig);
                    /*** zachovaj pomer strán ***/

                    /*** prevzorkuj obrázok ***/
                    $image_p = imagecreatetruecolor($width, $height);
                    $image = imagecreatefromjpeg($image);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    if (!is_writeable(dirname($compresspath))) {
                        /*** zapíš súbor na disk ***/
                        $error = "Nebodarilo sa nahrať obrázok"; // 6
                    } else {
                        imagejpeg($image_p, $compresspath, $quality);
                    }

                } else {
                    $error = "Nepodporovaný formát"; //7
                }

            }
        }
    }
    return $error;
}

function searchArray($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, searchArray($subarray, $key, $value));
        }
    }

    return $results;
}

function getStartAndEndDate($week, $year, $onlyWorkingDays = false) {
    $dto = new DateTime();
    $dto->setISODate(intval($year), intval($week));
    $ret['week_start'] = $dto->format('Y-m-d');
    if($onlyWorkingDays) $dto->modify('+4 days');
    else $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
  }
  
  function getFridayDateOfWeek($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $dto->modify('+4 days');
    return $dto->format('Y-m-d');
  }

function getTablePagination($pageCount, $activePage = 1){
    if($pageCount > 1) { ?>
            <?php if($pageCount > 5) { 
                if($activePage > 3 && $activePage + 2 < $pageCount){
                    $lowerBorder = $activePage - 2;
                    $higherBorder = $activePage + 2;
                    for($i = $lowerBorder; $i < $higherBorder + 1; $i++){ ?>
                        <div class="number <?php if($activePage == $i) echo "active"; ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
                    <?php } } else if($activePage < 4) { 
                    for($i = 1; $i < 6; $i++){ ?>
                        <div class="number <?php if($activePage == $i) echo "active"; ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
                    <?php } } else if($activePage + 3 > $pageCount) { 
                    $lowerBorder = $pageCount - 4;
                    $higherBorder = $pageCount;
                    for($i = $lowerBorder; $i < $higherBorder + 1; $i++){ ?>
                        <div class="number <?php if($activePage == $i) echo "active"; ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
                    <?php } } } else {
                for($i = 1; $i < $pageCount + 1; $i++){
            ?>
                <div class="number <?php if($activePage == $i) echo "active"; ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
            <?php } }  ?>
        <?php }
}

    function getActiveLang(){
        if(!isset($_GET['lang']) || ($_GET['lang'] != "en" && $_GET['lang'] != "de" && $_GET['lang'] != "sk")) {
            $lang = "en";
        } else {
            $lang = $_GET['lang'];
        }
        return $lang;
    }

    function getSortIconContainer(){
        switch (getActiveLang()) {
            case 'en':
                $titleDESC = "Table is sorted by this column with descending order.";
                $titleASC = "Table is sorted by this column with ascending order.";
                break;
            case 'sk':
                $titleDESC = "Tabuľka je zoradená podľa tohto stĺpca vzostupne.";
                $titleASC = "Tabuľka je zoradená podľa tohto stĺpca zostupne.";
                break;
            default: //de
                $titleDESC = "Die Tabelle ist nach dieser Spalte aufsteigend sortiert.";
                $titleASC = "Die Tabelle ist nach dieser Spalte absteigend sortiert.";
                break;
        }
        echo '<div class="sortIconContainer">
                <svg class="desc sortIcon" title="'.$titleDESC.'" data-order="desc" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.0001 6H14.6701C17.9801 6 19.3401 8.35 17.6801 11.22L16.3401 13.53L15.0001 15.84C13.3401 18.71 10.6301 18.71 8.97005 15.84L7.63005 13.53L6.29005 11.22C4.66005 8.35 6.01005 6 9.33005 6H12.0001Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <svg class="asc sortIcon" title="'.$titleASC.'" data-order="desc" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 18.0001H9.33004C6.02005 18.0001 4.66005 15.6501 6.32005 12.7801L7.66004 10.4701L9.00005 8.16007C10.66 5.29007 13.37 5.29007 15.03 8.16007L16.37 10.4701L17.71 12.7801C19.37 15.6501 18.01 18.0001 14.7 18.0001H12Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>';
    }

function createFilterModal($db, $tableName) {
    return new Modal(
        $db,
        $tableName."Filter",
        "Filtre tabuľky",
        "", 
        ["<button type='button' class='bttn bttn--secondary bttn--large dismiss'>Zrušiť</button>",
        "<button type='button' class='bttn bttn--primary bttn--large applyFilter dismiss'>Aplikovať</button>"],
        false,
        true,
        "filterModal"
    );
}

function getStringFromQuery($queryResults, $index, $delimeter = ","){
    $string = "";
    foreach ($queryResults as $result) {
        $string .= $result[$index].$delimeter;
    }
    return substr($string, 0, intval("-".strlen($delimeter)));
}
?>