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
<div class="event_list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $file = array();
        if ( ! empty($arItem['~DETAIL_PICTURE'])) {
            $file = CFile::ResizeImageGet($arItem['~DETAIL_PICTURE'], array('width' => 146, 'height' => 132),
                BX_RESIZE_IMAGE_EXACT, true);
            //$filePopup = CFile::ResizeImageGet($arItem['~DETAIL_PICTURE'], array('width'=>235, 'height'=>235), BX_RESIZE_IMAGE_EXACT, true);
        }
        ?>
        <div class="event_list-item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <? if ( ! empty($file['src'])): ?>
                <div class="event_item-img left"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"
                                                    class="red_shadow_img black_white"><img src="<?=$file['src'];?>"
                                                                                            alt="<? echo $arItem["NAME"] ?>"></a>
                </div><? endif ?>
            <div class="event_item-info overflow">
                <div class="clearfix">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h3 class="left"><? echo $arItem["NAME"] ?></h3></a>
                    <div class="event_item-time right"><i></i><?=ConvertDateTime($arItem["ACTIVE_FROM"],
                            $arParams['ACTIVE_DATE_FORMAT'], "ru");?></div>
                </div>
                <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
            </div>
        </div>
    <? endforeach; ?>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?=$arResult["NAV_STRING"]?>
<? endif; ?>
