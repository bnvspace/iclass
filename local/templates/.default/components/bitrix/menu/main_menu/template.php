<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (!empty($arResult)): ?>
    <menu class="no-list left-list">
        <? foreach ($arResult as $arItem):
        if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
            continue;
        } ?>
        <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
        <? if ($prevItem['DEPTH_LEVEL'] > 1): ?></ul></div><? endif ?>
        <? if ($arItem["SELECTED"]): ?>
        <li>
            <? if ($arItem['IS_PARENT'] == 1 && strpos($arItem["LINK"], '/countries/') !== false): ?>
                <a class="selected"><?=$arItem["TEXT"]?></a>
            <? else: ?>
                <a href="<?=$arItem["LINK"]?>" class="selected <? if ($arItem['PARAMS']['DISABLED'] == 'Y'): ?>js-disabledLink<? endif ?>">
                    <?=$arItem["TEXT"]?>
                </a>
            <? endif; ?>
            <? if ($arItem['IS_PARENT'] == 1): ?>
            <div class="sub_menu clearfix">
                <ul class="arrow-list left">
                    <? endif ?>
                    <? else: ?>
                    <li>
                        <? if ($arItem['IS_PARENT'] == 1 && strpos($arItem["LINK"], '/countries/') !== false): ?>
                            <a><?=$arItem["TEXT"]?></a>
                        <? else: ?>
                            <a href="<?=$arItem["LINK"]?>" <? if ($arItem['PARAMS']['DISABLED'] == 'Y'): ?>class="js-disabledLink"<? endif ?>><?=$arItem["TEXT"]?></a>
                        <? endif; ?>
                        <? if ($arItem['IS_PARENT'] == 1): ?>
                        <div class="sub_menu clearfix">
                            <ul class="arrow-list left">
                                <? endif ?>
                                <? endif ?>
                                <? else: ?>
                                    <li>
                                        <a href="<?=str_replace("/countries/obedinennye-arabskie-emiraty/","/higher-education/uae/",str_replace("/countries/kitay/","/higher-education/kitay/",$arItem["LINK"]))?>">
                                            <b><?=$arItem["TEXT"]?></b></a>
                                    </li>
                                <? endif ?>
                                <? $prevItem = $arItem; ?>
                                <? endforeach ?>
                                <? if ($prevItem['DEPTH_LEVEL'] > 1): ?></ul></div><? endif ?>
    </menu>
<? endif ?>
