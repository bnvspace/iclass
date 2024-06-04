<?
    define('IBLOCK_ID_EVENTS', 8);
    define('IBLOCK_ID_EVENT_REGISTRATIONS', 17);

    define('IBLOCK_ID_EDU_HIGH', 13);
    define('IBLOCK_ID_EDU_MIDDLE', 14);
    define('IBLOCK_ID_EDU_LANG', 19);
    define('IBLOCK_ID_EDU_PROF', 15);

    define('IBLOCK_ID_NEWS', 2);

    define("RE_SITE_KEY", "6LfqoysUAAAAAEEc0lRCBvC2dUgTy__iGdCUI4P2");
    define("RE_SEC_KEY", "6LfqoysUAAAAAOBmyVsmziRyk8APVduEKyEwCGmo");


    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/php_interface/include/BxExtra/Types/Block.php");
    //AddEventHandler('iblock', 'OnIBlockPropertyBuildList', array('\BxExtra\Types\Block', 'GetUserTypeDescription'));


    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/php_interface/include/BxExtra/Handlers/Event.php");
   // AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("\BxExtra\Handlers\Event", "OnAfterEventAdd"));


    function getRealCurDir()
    {
        global $APPLICATION;
        $filePath = $_SERVER["REAL_FILE_PATH"];
        $fileArr  = explode("/", $filePath);
        array_pop($fileArr);
        $curDir = $_SERVER["REAL_FILE_PATH"] ? implode("/", $fileArr) . "/" : $APPLICATION->GetCurDir();

        return $curDir;
    }

    function isStartPage()
    {
        if ((getRealCurDir() == "") or (getRealCurDir() == "/")) {
            return true;
        } else {
            return false;
        }
    }

//FormatHelper::plural(count($arResult['ITEMS']), array('позиция', 'позиции', 'позиций'))
    class FormatHelper
    {
        public function FileSize($sizeInBytes)
        {
            $s = array('байт', 'кб', 'Мб', 'Гб', 'Тб', 'Пб');
            $n = floor(log($sizeInBytes, 1024));

            return number_format($sizeInBytes / pow(1024, $n), 1, ',', ' ') . ' ' . $s[$n];
        }

        public function dates($dateString)
        {
            $date   = strtotime($dateString);
            $months = array(
                '',
                'января',
                'февраля',
                'марта',
                'апреля',
                'мая',
                'июня',
                'июля',
                'августа',
                'сентября',
                'октября',
                'ноября',
                'декабря'
            );

            return date('d', $date) . '  ' . $months[(int)date('m', $date)] . ', ' . date('H:i');
        }

        public function plural($number, $titles)
        {
            $cases = array(2, 0, 1, 1, 1, 2);

            return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
        }

        public function price($price)
        {
            $price = number_format($price, 0, ',', ' ');

            return $price;
        }

        public function jsonOutput($data, $restartBuffer = true)
        {
            if ($restartBuffer === true) {
                global $APPLICATION;
                $APPLICATION->RestartBuffer();
            }
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }

    function pr($item, $show_for = false)
    {
        global $USER;
        if ($USER->IsAdmin() || $show_for == 'all') {
            if ( ! $item) {
                echo ' <br />пусто <br />';
            } elseif (is_array($item) && empty($item)) {
                echo '<br />массив пуст <br />';
            } else {
                echo ' <pre>' . print_r($item, true) . ' </pre>';
            }
        }
    }