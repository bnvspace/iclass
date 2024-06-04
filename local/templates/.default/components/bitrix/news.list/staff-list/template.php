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
<div class="row staff-card-list   ">
    <? foreach ($arResult["ITEMS"] as $i => $arItem) { ?>
        <?
        $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
        $file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array("width" => 130, "height" => 195),
            BX_RESIZE_IMAGE_PROPORTIONAL, false);
        ?>
        <div class="staff-card">
            <div class="worker clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="left worker-img"><img src="<?=$file["src"]?>" alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
                                                  title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"></div>
                <div class="preview-staff">
                    <h3><? echo $arItem["NAME"] ?></h3>
                    <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                </div>
                <div><? echo $arItem["DETAIL_TEXT"]; ?></div>
            </div>
        </div>
    <? } ?>
</div>