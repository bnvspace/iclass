<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
    /** @var array $arParams */
    /** @var array $arResult */
    /** @global CMain $APPLICATION */
    /** @global CUser $USER */
    /** @global CDatabase $DB */
    /** @var CBitrixComponentTemplate $this */
    /** @var string $templateName */
    /** @var string $templateFile */
    /** @var string $templateFolder */
    /** @var string $componentPath */
    /** @var CBitrixComponent $component */
    $this->setFrameMode(true);
?>

<h1 class="text-center"><? $APPLICATION->ShowTitle(false) ?></h1>

<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "page_menu",
    Array(
        "IBLOCK_TYPE"          => $arParams['IBLOCK_TYPE'],
        "IBLOCK_ID"            => $arParams['IBLOCK_ID'],
        "SECTION_ID"           => "",
        "SECTION_CODE"         => "",
        "COUNT_ELEMENTS"       => "N",
        "TOP_DEPTH"            => "1",
        "SECTION_FIELDS"       => array("", ""),
        "SECTION_USER_FIELDS"  => array("", ""),
        "VIEW_MODE"            => "LIST",
        "SHOW_PARENT_NAME"     => "Y",
        "SECTION_URL"          => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "CACHE_TYPE"           => "N",
        "CACHE_TIME"           => "36000000",
        "CACHE_GROUPS"         => "Y",
        "ADD_SECTIONS_CHAIN"   => "Y",
        "CURRENT_SECTION_CODE" => $arResult['VARIABLES']['SECTION_CODE'],
    ),
    $component
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "",
    Array(
        "IBLOCK_TYPE"   => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"     => $arParams["IBLOCK_ID"],
        "NEWS_COUNT"    => $arParams["NEWS_COUNT"],
        "SORT_BY1"      => $arParams["SORT_BY1"],
        "SORT_ORDER1"   => $arParams["SORT_ORDER1"],
        "SORT_BY2"      => $arParams["SORT_BY2"],
        "SORT_ORDER2"   => $arParams["SORT_ORDER2"],
        "FIELD_CODE"    => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE"     => $arParams["SET_TITLE"],

        "SET_STATUS_404"                  => "Y",
        "SHOW_404"                        => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN"       => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN"              => $arParams["ADD_SECTIONS_CHAIN"],
        "CACHE_TYPE"                      => $arParams["CACHE_TYPE"],
        "CACHE_TIME"                      => $arParams["CACHE_TIME"],
        "CACHE_FILTER"                    => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS"                    => $arParams["CACHE_GROUPS"],
        "DISPLAY_TOP_PAGER"               => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER"            => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE"                     => $arParams["PAGER_TITLE"],
        "PAGER_TEMPLATE"                  => $arParams["PAGER_TEMPLATE"],
        "PAGER_SHOW_ALWAYS"               => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_DESC_NUMBERING"            => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL"                  => $arParams["PAGER_SHOW_ALL"],
        "DISPLAY_DATE"                    => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME"                    => "Y",
        "DISPLAY_PICTURE"                 => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT"            => $arParams["DISPLAY_PREVIEW_TEXT"],
        "PREVIEW_TRUNCATE_LEN"            => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT"              => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "USE_PERMISSIONS"                 => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS"               => $arParams["GROUP_PERMISSIONS"],
        "FILTER_NAME"                     => $arParams["FILTER_NAME"],
        "HIDE_LINK_WHEN_NO_DETAIL"        => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES"                     => $arParams["CHECK_DATES"],

        "PARENT_SECTION"      => $arResult["VARIABLES"]["SECTION_ID"],
        "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "DETAIL_URL"          => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL"         => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "IBLOCK_URL"          => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
    ),
    $component
); ?>
