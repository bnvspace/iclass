<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (count($arResult["ITEMS"])): ?>
    <div class="link_list-type2">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
        <? endforeach; ?>
    </div>
<? endif ?>