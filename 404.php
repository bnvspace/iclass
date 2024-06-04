<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
/*
$url = $APPLICATION->GetCurPage();
$url = trim($url, '/');
$redirectUrl = '';

$simpleRedirect = array(
	'company_workers' => '/company/team/',
	'company_history' => '/company/',
	'company_certificate' => '/company/certificates/',

	'study_abroad_info' => '/information/special/',
	'study_abroad_response' => '/information/responses/',

	'promo' => '/events/',
	'events' => '/information/special/',

	'study_abroad_adult_special' => '/professional/great-britain/',

	'study_abroad_children' => '/language/great-britain/dlya-detey/',

	'study_abroad' => '/',
	'study_abroad_article_two' => '/',
);

if (isset($simpleRedirect[$url])) {
	$redirectUrl = $simpleRedirect[$url];
}

CModule::IncludeModule('iblock');
// высшее образование
if (empty($redirectUrl) && strpos($url, 'study_abroad_high') === 0) {
	$rs = CIBlockElement::GetList(array(), array('IBLOCK_ID' => IBLOCK_ID_EDU_HIGH, 'PROPERTY_OLD_URL' => $url), false, false, array('ID', 'DETAIL_PAGE_URL'));
	if ($r = $rs->GetNext()) {
		$redirectUrl = $r['DETAIL_PAGE_URL'];
	} else {
		$tmp = explode('_', $url);
		$code = array_pop($tmp);
		$newCodes = array('gb' => 'great-britain', 'netherlands' => 'netherland');
		if (isset($newCodes[$code])) {
			$code = $newCodes[$code];
		}
		$rs = CIBlockSection::GetList(array(), array('IBLOCK_ID' => IBLOCK_ID_EDU_HIGH, 'CODE' => $code), false, false, array('ID', 'SECTION_PAGE_URL'));
		if ($r = $rs->GetNext()) {
			$redirectUrl = $r['SECTION_PAGE_URL'];
		} else {
			$redirectUrl = '/higher-education/';
		}
	}
}

//news
if (empty($redirectUrl) && strpos($url, 'news') === 0) {
	$tmp = explode('/', $url);
	$code = array_pop($tmp);
	print $code;
	$rs = CIBlockElement::GetList(array(), array('IBLOCK_ID' => IBLOCK_ID_NEWS, 'CODE' => $code), false, false, array('ID', 'DETAIL_PAGE_URL'));
	if ($r = $rs->GetNext()) {
		$redirectUrl = $r['DETAIL_PAGE_URL'];
	} else {
		$redirectUrl = '/information/news/';
	}
}

// среднее образование
if (empty($redirectUrl)) {
	$rs = CIBlockElement::GetList(array(), array('IBLOCK_ID' => IBLOCK_ID_EDU_MIDDLE, 'PROPERTY_OLD_URL' => $url), false, false, array('ID', 'DETAIL_PAGE_URL'));
	if ($r = $rs->GetNext()) {
		$redirectUrl = $r['DETAIL_PAGE_URL'];
	} else {
		$tmp = explode('_', $url);
		$code = array_pop($tmp);
		$newCodes = array('gb' => 'great-britain');
		if (isset($newCodes[$code])) {
			$code = $newCodes[$code];
		}
		$rs = CIBlockSection::GetList(array(), array('IBLOCK_ID' => IBLOCK_ID_EDU_MIDDLE, 'CODE' => $code), false, false, array('ID', 'SECTION_PAGE_URL'));
		if ($r = $rs->GetNext()) {
			$redirectUrl = $r['SECTION_PAGE_URL'];
		} else {
			$redirectUrl = '/secondary-education/';
		}
	}
}
*/
//check new site не мой
/*if (empty($redirectUrl)) {
	$newSiteUrl = 'http://iclass-study.ru/' . $url . '/';

	$options['http'] = array(
	    'method' => "HEAD",
	    'ignore_errors' => 1,
	);

	$context = stream_context_create($options);

	$body = file_get_contents($newSiteUrl, NULL, $context);


	$responses = parse_http_response_header($http_response_header);


	$code = $responses[0]['status']['code'];

	if ($code == 200) {
		$redirectUrl = $newSiteUrl;
	}
}*/


/*
if (!empty($redirectUrl)) {
	LocalRedirect($redirectUrl, false, "301 Moved Permanently");
	exit();
}

function parse_http_response_header(array $headers)
{
    $responses = array();
    $buffer = NULL;
    foreach ($headers as $header)
    {
        if ('HTTP/' === substr($header, 0, 5))
        {
            // add buffer on top of all responses
            if ($buffer) array_unshift($responses, $buffer);
            $buffer = array();

            list($version, $code, $phrase) = explode(' ', $header, 3) + array('', FALSE, '');

            $buffer['status'] = array(
                'line' => $header,
                'version' => $version,
                'code' => (int) $code,
                'phrase' => $phrase
            );
            $fields = &$buffer['fields'];
            $fields = array();
            continue;
        }
        list($name, $value) = explode(': ', $header, 2) + array('', '');
        // header-names are case insensitive
        $name = strtoupper($name);
        // values of multiple fields with the same name are normalized into
        // a comma separated list (HTTP/1.0+1.1)
        if (isset($fields[$name]))
        {
            $value = $fields[$name].','.$value;
        }
        $fields[$name] = $value;
    }
    unset($fields); // remove reference
    array_unshift($responses, $buffer);

    return $responses;
}
*/


$APPLICATION->SetPageProperty("TITLE", "404 Not Found");
$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("keywords", "Страница не найдена");
$APPLICATION->SetPageProperty("description", "Страница не найдена");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>
<h1>Ошибка 404</h1>
<p>Страница, которую вы запрашиваете, удалена или еще не создана. Вернитесь на главную страницу или воспользуйтесь картой сайтой для поиска нужной информации.</p>
<?
$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"N",
	"CACHE_TIME"	=>	"3600"
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>