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
<? $rsSections = CIBlockSection::GetList(
    array(),
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "CODE" => $arResult['VARIABLES']['SECTION_CODE'],
    ),
    false,
    array("ID", "UF_*")
);
while($arSection = $rsSections->Fetch()){
    $notFollow = $arSection['UF_NOT_FOLLOW'];
}

if ($notFollow){
    $APPLICATION->SetPageProperty("robots", "noindex, nofollow");
}

?>
<h1 class="text-center"><? $APPLICATION->ShowTitle(false) ?></h1>

<?php
    $rsCountry = CIBlockSection::GetList(array(),
        array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $arResult['VARIABLES']['SECTION_CODE'], 'ACTIVE' => 'Y'),
        false, array('nTopCount' => 1));
    if ( ! $arCountry = $rsCountry->GetNext()) {
        \Bitrix\Iblock\Component\Tools::process404(
            trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_DETAIL_NF")
            , true
            , $arParams["SET_STATUS_404"] === "Y"
            , $arParams["SHOW_404"] === "Y"
            , $arParams["FILE_404"]
        );

        return;
    }

    $filterIDs = array();
    $rsItems   = CIBlockElement::GetList(array(),
        array('IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'PROPERTY_COUNTRY' => $arCountry['ID']), array('IBLOCK_SECTION_ID'));
    while ($r = $rsItems->Fetch()) {
        $filterIDs[] = $r['IBLOCK_SECTION_ID'];
    }

?>

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
    "bitrix:catalog.section.list",
    "page_menu_prof",
    Array(
        "IBLOCK_TYPE"         => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"           => 18,
        "SECTION_ID"          => "",
        "SECTION_CODE"        => "",
        "COUNT_ELEMENTS"      => "N",
        "TOP_DEPTH"           => "2",
        "SECTION_FIELDS"      => array("", ""),
        "SECTION_USER_FIELDS" => array("", ""),
        "VIEW_MODE"           => "LIST",
        "SHOW_PARENT_NAME"    => "Y",
        "SECTION_URL"         => "",
        "CACHE_TYPE"          => "A",
        "CACHE_TIME"          => "36000000",
        "CACHE_GROUPS"        => "Y",
        "ADD_SECTIONS_CHAIN"  => "N",
        "FILTER_IDS"          => $filterIDs,
    ),
    $component
); ?>
<? $APPLICATION->IncludeComponent(
    "iclass:section.data",
    "",
    Array(
        "IBLOCK_TYPE"                     => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"                       => $arParams["IBLOCK_ID"],
        "NEWS_COUNT"                      => $arParams["NEWS_COUNT"],
        "SORT_BY1"                        => $arParams["SORT_BY1"],
        "SORT_ORDER1"                     => $arParams["SORT_ORDER1"],
        "SORT_BY2"                        => $arParams["SORT_BY2"],
        "SORT_ORDER2"                     => $arParams["SORT_ORDER2"],
        "FIELD_CODE"                      => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE"                   => $arParams["LIST_PROPERTY_CODE"],
        "DISPLAY_PANEL"                   => $arParams["DISPLAY_PANEL"],
        "SET_TITLE"                       => "Y",
        "SET_STATUS_404"                  => $arParams["SET_STATUS_404"],
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

        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "DETAIL_URL"   => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL"  => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "IBLOCK_URL"   => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
    ),
    $component
); ?>

<?
    global $arServicesFilter;
    $arServicesFilter = array(
        'PROPERTY_COUNTRY' => $arCountry['ID'],
    );
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "services",
    Array(
        "IBLOCK_TYPE"                     => "learning",
        "IBLOCK_ID"                       => "18",
        "NEWS_COUNT"                      => "100",
        "SORT_BY1"                        => "SORT",
        "SORT_ORDER1"                     => "ASC",
        "SORT_BY2"                        => "",
        "SORT_ORDER2"                     => "",
        "FILTER_NAME"                     => "arServicesFilter",
        "FIELD_CODE"                      => array("", ""),
        "PROPERTY_CODE"                   => array("SERVICES", ""),
        "CHECK_DATES"                     => "N",
        "DETAIL_URL"                      => "",
        "AJAX_MODE"                       => "N",
        "AJAX_OPTION_JUMP"                => "N",
        "AJAX_OPTION_STYLE"               => "Y",
        "AJAX_OPTION_HISTORY"             => "N",
        "CACHE_TYPE"                      => "A",
        "CACHE_TIME"                      => "36000000",
        "CACHE_FILTER"                    => "N",
        "CACHE_GROUPS"                    => "N",
        "PREVIEW_TRUNCATE_LEN"            => "",
        "ACTIVE_DATE_FORMAT"              => "",
        "SET_STATUS_404"                  => "N",
        "SET_TITLE"                       => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
        "ADD_SECTIONS_CHAIN"              => "N",
        "HIDE_LINK_WHEN_NO_DETAIL"        => "N",
        "PARENT_SECTION"                  => "",
        "PARENT_SECTION_CODE"             => "",
        "INCLUDE_SUBSECTIONS"             => "N",
        "DISPLAY_DATE"                    => "Y",
        "DISPLAY_NAME"                    => "Y",
        "DISPLAY_PICTURE"                 => "Y",
        "DISPLAY_PREVIEW_TEXT"            => "Y",
        "PAGER_TEMPLATE"                  => "",
        "DISPLAY_TOP_PAGER"               => "N",
        "DISPLAY_BOTTOM_PAGER"            => "Y",
        "PAGER_TITLE"                     => "Новости",
        "PAGER_SHOW_ALWAYS"               => "N",
        "PAGER_DESC_NUMBERING"            => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL"                  => "N"
    ),
    $component
); ?>
