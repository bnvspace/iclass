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
<?
$arSelect = [
    'PROPERTY_NOT_FOLLOW',
];
$arFilter = [
    'IBLOCK_ID' => $arParams["IBLOCK_ID"],
    'CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
];
$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 1), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $notFollow = $arFields['PROPERTY_NOT_FOLLOW_VALUE'];
}
if ($notFollow){
    $APPLICATION->SetPageProperty("robots", "noindex, nofollow");
}
?>
<div class="text-center eventh1">События</div>

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

<? $ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "",
    Array(
        "DISPLAY_DATE"         => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME"         => $arParams["DISPLAY_NAME"],
        "DISPLAY_PICTURE"      => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "IBLOCK_TYPE"          => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"            => $arParams["IBLOCK_ID"],
        "FIELD_CODE"           => $arParams["DETAIL_FIELD_CODE"],
        "PROPERTY_CODE"        => $arParams["DETAIL_PROPERTY_CODE"],
        "DETAIL_URL"           => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL"          => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "META_KEYWORDS"        => $arParams["META_KEYWORDS"],
        "META_DESCRIPTION"     => $arParams["META_DESCRIPTION"],
        "BROWSER_TITLE"        => $arParams["BROWSER_TITLE"],
        "DISPLAY_PANEL"        => $arParams["DISPLAY_PANEL"],
        "SET_TITLE"            => $arParams["SET_TITLE"],

        "SET_STATUS_404"            => "Y",
        "SHOW_404"                  => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN"        => $arParams["ADD_SECTIONS_CHAIN"],
        "ACTIVE_DATE_FORMAT"        => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE"                => $arParams["CACHE_TYPE"],
        "CACHE_TIME"                => $arParams["CACHE_TIME"],
        "CACHE_GROUPS"              => $arParams["CACHE_GROUPS"],
        "USE_PERMISSIONS"           => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS"         => $arParams["GROUP_PERMISSIONS"],
        "DISPLAY_TOP_PAGER"         => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER"      => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE"               => $arParams["DETAIL_PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS"         => "N",
        "PAGER_TEMPLATE"            => $arParams["DETAIL_PAGER_TEMPLATE"],
        "PAGER_SHOW_ALL"            => $arParams["DETAIL_PAGER_SHOW_ALL"],
        "CHECK_DATES"               => $arParams["CHECK_DATES"],
        "ELEMENT_ID"                => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE"              => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "IBLOCK_URL"                => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "USE_SHARE"                 => $arParams["USE_SHARE"],
        "SHARE_HIDE"                => $arParams["SHARE_HIDE"],
        "SHARE_TEMPLATE"            => $arParams["SHARE_TEMPLATE"],
        "SHARE_HANDLERS"            => $arParams["SHARE_HANDLERS"],
        "SHARE_SHORTEN_URL_LOGIN"   => $arParams["SHARE_SHORTEN_URL_LOGIN"],
        "SHARE_SHORTEN_URL_KEY"     => $arParams["SHARE_SHORTEN_URL_KEY"],
        "ADD_ELEMENT_CHAIN"         => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : '')
    ),
    $component
); ?>

