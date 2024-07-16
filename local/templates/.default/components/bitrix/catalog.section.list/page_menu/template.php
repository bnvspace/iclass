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

//print '<pre>';
//print_r($arResult);

?>

<? if (count($arResult['SECTIONS'])): ?>
    <div class="link_list" id="liksss" style="height:82px;"><span>
<? foreach ($arResult['SECTIONS'] as $arSection): ?>
    <a href="<?=$arSection['SECTION_PAGE_URL']?>" <? if ($arSection['CODE'] ==
                                                         $arParams['CURRENT_SECTION_CODE']): ?>class="selected"<? endif ?>><?=$arSection['NAME']?></a>
<? endforeach ?>
</span>

</div>
    <br >
  <? if (count($arResult['SECTIONS']) >= 5): ?> <button class="link_list-type2-btn">Показать полностью</button><?endif;?>
<!--    <br >  <br >-->
<? endif ?>