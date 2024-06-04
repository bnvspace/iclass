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
<div class="right_banner">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="right_banner-slider_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

            <? if ( ! empty($arItem['PROPERTIES']['LINK']['VALUE'])): ?>
                <? if ( ! preg_match('/iclass/i', $arItem['PROPERTIES']['LINK']['VALUE'])) { ?>
                    <noindex><a target="_blank" rel="nofollow" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>"></a>
                    </noindex>
                <? } else { ?>
                    <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>"></a>
                <? } ?>
            <? endif ?>

            <div class="right_banner-slider_content">
                <div class="right_banner-slider_title"><? echo $arItem["NAME"] ?></div>
                <div class="right_banner-slider_text"><? echo $arItem["PREVIEW_TEXT"]; ?></div>
            </div>
            <div class="right_banner-mask"></div>
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
        </div>
    <? endforeach; ?>
</div>
<div class="slide_arrows right_banner_arrows-carousel"><a href="#prev"></a><a href="#next"></a></div>