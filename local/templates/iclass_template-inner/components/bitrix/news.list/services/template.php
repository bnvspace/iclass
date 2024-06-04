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

<div class="service_list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $file = CFile::ResizeImageGet($arItem['~DETAIL_PICTURE'], array('width' => 121, 'height' => 181),
            BX_RESIZE_IMAGE_EXACT, false);
        ?>
        <a href="#service_<?=$arItem['ID']?>" class="service_item">
            <span class="service_item-icon"><i class="<?=$arItem['PROPERTIES']['CSS_CLASS']['VALUE']?>"></i></span>
            <span class="service_item-name"><?=$arItem['NAME']?></span>
        </a>

    <? endforeach; ?>

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <h2 id="service_<?=$arItem['ID']?>"><?=$arItem['NAME']?></h2>
        <?=$arItem['DETAIL_TEXT']?>
    <? endforeach ?>

</div>
