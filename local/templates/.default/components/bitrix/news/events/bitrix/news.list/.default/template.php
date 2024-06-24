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
        $file      = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 146, 'height' => 132),
            BX_RESIZE_IMAGE_EXACT, true);
        $filePopup = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 235, 'height' => 235),
            BX_RESIZE_IMAGE_EXACT, true);

        $date = '';
        if ( ! empty($arItem["DATE_ACTIVE_FROM"])) {
            $date .= ConvertDateTime($arItem["DATE_ACTIVE_FROM"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
            if ( ! empty($arItem["DATE_ACTIVE_TO"])) {
                $date .= ' - ' . ConvertDateTime($arItem["DATE_ACTIVE_TO"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
            }
        } else {
            if ( ! empty($arItem["DATE_ACTIVE_TO"])) {
                $date .= 'до ' . ConvertDateTime($arItem["DATE_ACTIVE_TO"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
            }
        }


        //print_r($arItem);
        ?>
        <div class="event_list-item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <? if ( ! empty($file['src'])): ?>
                <div class="event_item-img left"><a href="#" class="red_shadow_img black_white js-eventToggle"><img
                            src="<?=$file['src'];?>" alt="<? echo $arItem["NAME"] ?>"></a></div><? endif ?>
            <div class="event_item-info overflow">
                <div class="clearfix">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h3 class="left"><? echo $arItem["NAME"] ?></h3></a>
                    <div class="event_item-time right"><i></i><?=$date?></div>
                </div>
                <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                <div class="event_item-more_text none">
<!--                    --><?//
//                    preg_match('/\[UPLABTILDA/', $arItem["DETAIL_TEXT"], $matches);
//                    if (empty($matches)) {
//                        echo $arItem["DETAIL_TEXT"];
//                    }
//                    ?>
                    <? if ($arItem['PROPERTIES']['REGISTER_ALLOW']['VALUE'] == 1): ?>
                        <div class="text-center sing_event"><a
                                href="/ajax/event-register.php?eventId=<?=$arItem['ID']?>"
                                class="red_but fancybox_event" data-fancybox-type="ajax">зарегистрироваться<br>на
                            мероприятие</a></div><? endif ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?=$arResult["NAV_STRING"]?>
<? endif; ?>


