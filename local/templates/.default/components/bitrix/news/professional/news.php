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
<?$APPLICATION->SetPageProperty("ROBOTS", "noindex, nofollow");?>
<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "page_menu",
    Array(
        "IBLOCK_TYPE"         => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"           => $arParams["IBLOCK_ID"],
        "SECTION_ID"          => "",
        "SECTION_CODE"        => "",
        "COUNT_ELEMENTS"      => "N",
        "TOP_DEPTH"           => "1",
        "SECTION_FIELDS"      => array("", ""),
        "SECTION_USER_FIELDS" => array("", ""),
        "VIEW_MODE"           => "LIST",
        "SHOW_PARENT_NAME"    => "Y",
        "SECTION_URL"         => "",
        "CACHE_TYPE"          => "A",
        "CACHE_TIME"          => "36000000",
        "CACHE_GROUPS"        => "Y",
        "ADD_SECTIONS_CHAIN"  => "N",
    ),
    $component
); ?>