<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости интернет-магазина");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "2",
		"NEWS_COUNT" => "5",
		"USE_SEARCH" => "N",
		"USE_RSS" => "Y",
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "360",
		"YANDEX" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "Y",
		"CATEGORY_IBLOCK" => array(
			0 => "2",
		),
		"CATEGORY_CODE" => "THEMES",
		"CATEGORY_ITEMS_COUNT" => "4",
		"CATEGORY_THEME_#ID(XML_ID=content-news)#" => "list",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/content/news/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"DISPLAY_PANEL" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "0",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "N",
		"META_KEYWORDS" => "KEYWORDS",
		"META_DESCRIPTION" => "DESCRIPTION",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "SOURCE",
			2 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"CATEGORY_THEME_2" => "list",
		"CACHE_GROUPS" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_SHARE" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"FILE_404" => "",
		"MESSAGE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_ID#/",
			"detail" => "#ELEMENT_ID#/",
			"rss" => "rss/",
			"rss_section" => "#SECTION_ID#/rss/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>