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
<div class="review_list">


    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 133, 'height' => 133),
            BX_RESIZE_IMAGE_EXACT, false);
        if (empty($arItem['PREVIEW_PICTURE'])) {
            $file['src'] = "/bitrix/media/images/review_no-photo.jpg";
        }
        ?>
        <div class="review_item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="reviewer left"><img src="<?=$file['src'];?>" alt="<? echo $arItem["NAME"] ?>"></div>
            <div class="overflow reviewer_text">
                <div>
                    <div class="clearfix">
                        <? if ( ! empty($arItem['DETAIL_TEXT'])): ?><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h3
                                    class="left"><? echo $arItem["NAME"] ?></h3></a>
                        <? else: ?><h3 class="left"><? echo $arItem["NAME"] ?></h3><? endif ?>
                        <div class="event_item-time right"><i></i><?=$arItem['DISPLAY_ACTIVE_FROM'];?></div>
                    </div>
                    <div class="clearfix"><? echo $arItem["PREVIEW_TEXT"]; ?></div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <br>
    <div class="text-center"><a href="#" class="blue_but">читать Больше отзывов</a></div>
</div>
