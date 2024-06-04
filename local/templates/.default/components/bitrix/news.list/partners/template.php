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

<? foreach ($arResult['SECTIONS'] as $arSection): ?>
    <? if (count($arSection['ITEMS'])): ?>
        <h2><?=$arSection['NAME']?></h2>

        <div class="partners_list">
            <? foreach ($arSection['ITEMS'] as $arItem): ?>
                <? if ( ! preg_match('/iclass/i', $arItem['PROPERTIES']['URL']['VALUE'])) { ?>
                    <noindex><a target="_blank" rel="nofollow" href="<?=$arItem['PROPERTIES']['URL']['VALUE']?>"
                                class="black_white"><img style="width: auto;"
                                                         src="<?=$arItem['PICTURE_RESIZED']['src']?>"
                                                         alt="<?=$arItem['NAME']?>"></a></noindex>
                <? } else { ?>
                    <a href="<?=$arItem['PROPERTIES']['URL']['VALUE']?>" class="black_white"><img style="width: auto;"
                                                                                                  src="<?=$arItem['PICTURE_RESIZED']['src']?>"
                                                                                                  alt="<?=$arItem['NAME']?>"></a>
                <? } ?>
            <? endforeach ?>
        </div>

    <? endif ?>
<? endforeach ?>

