<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?
    $i = 0;
?>
<? foreach ($arResult['SECTIONS'] as $arSection): ?>
    <? if (is_array($arSection['ITEMS']) && count($arSection['ITEMS'])): ?>
        <div class="links_block-list clearfix js-PageContent <? if ($i > 0): ?>none<? endif ?>"
             id="sectionBlock_<?=$arSection['ID']?>">
            <? foreach ($arSection['ITEMS'] as $arItem): ?>
                <div class="links_block">
                    <? if ( ! empty($arItem['SCHOOL']['ID'])): ?>
                        <a href="<?=$arItem['SCHOOL']['DETAIL_PAGE_URL']?>"><h3><?=$arItem['NAME']?></h3></a>
                    <? else: ?>
                        <h3><?=$arItem['NAME']?></h3>
                    <? endif ?>
                    <?=$arItem['DETAIL_TEXT']?>
                    <div class="ul_list-title">Специализированные курсы:</div>
                    <ul>
                        <? foreach ($arItem['PROPERTIES']['SERVICES']['VALUE'] as $service): ?>
                            <li><?=$service?></li>
                        <? endforeach ?>
                    </ul>
                </div>
            <? endforeach ?>
        </div>
        <? $i++ ?>
    <? endif ?>
<? endforeach ?>