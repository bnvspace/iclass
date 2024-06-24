<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<?
    $date = '';
    if ( ! empty($arResult["DATE_ACTIVE_FROM"])) {
        $date .= ConvertDateTime($arResult["DATE_ACTIVE_FROM"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
        if ( ! empty($arResult["DATE_ACTIVE_TO"])) {
            $date .= ' - ' . ConvertDateTime($arResult["DATE_ACTIVE_TO"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
        }
    } else {
        if ( ! empty($arResult["DATE_ACTIVE_TO"])) {
            $date .= 'до ' . ConvertDateTime($arResult["DATE_ACTIVE_TO"], $arParams['ACTIVE_DATE_FORMAT'], "ru");
        }
    }
?>

<div class="event_list-item clearfix" id="<?=$this->GetEditAreaId($arResult['ID']);?>">
    <? if ( ! empty($file['src'])): ?>
        <div class="event_item-img left"><a href="#" class="red_shadow_img black_white js-eventToggle"><img
                    src="<?=$file['src'];?>" alt="<? echo $arResult["NAME"] ?>"></a></div><? endif ?>
    <div class="2 event_item-info overflow">
        <div class="clearfix">
            <h1 class="left"><? echo $arResult["NAME"] ?></h1>
            <div class="event_item-time right"><i></i><?=$date?></div>
        </div>
        <div class="event_item-more_text">
            <? echo $arResult["DETAIL_TEXT"]; ?>
            <? if ($arResult['PROPERTIES']['REGISTER_ALLOW']['VALUE'] == 1): ?>
                <div class="text-center sing_event"><a href="/ajax/event-register.php?eventId=<?=$arResult['ID']?>"
                                                       class="red_but fancybox_event" data-fancybox-type="ajax">зарегистрироваться<br>на
                    мероприятие</a></div><? endif ?>
        </div>
    </div>
</div>