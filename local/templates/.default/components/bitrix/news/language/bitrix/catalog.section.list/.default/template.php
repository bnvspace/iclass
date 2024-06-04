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

    if ($_GET['test']) {
        print '<pre>';
        print_r($arResult);
        print '</pre>';
    }
?>
<? if (!empty($arResult['ITEMS'])): ?>
    <table class="scroll-table">
        <tr>
            <?
                $colsPan = 1;
                foreach ($arResult['ITEMS'] as $arItem) {
                    $arSchool = $arResult['SCHOOLS'][$arItem['PROPERTY_SCHOOL_VALUE']];
                    if ( ! empty($arSchool)) {
                        $colsPan = 2;
                    }
                }
            ?>
            <th colspan="<?=$colsPan?>">наименование и местоположение</th>
            <th>даты</th>
            <th>возраст</th>
            <th>стоимость</th>
            <th>проживание</th>
        </tr>
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <?
            $arSchool = $arResult['SCHOOLS'][$arItem['PROPERTY_SCHOOL_VALUE']];
            ?>
            <tr>
                <td width="168" class="table_img">
                    <div class="table_img-item"><img src="<?=$arItem['PICTURE_RESIZED']['src']?>"
                                                     alt="<?=$arSchool['NAME']?>"></div>
                </td>
                <? if ( ! empty($arSchool['DETAIL_PAGE_URL'])) { ?>
                    <td align="center"><a href="<?=$arSchool['DETAIL_PAGE_URL']?>"><b><?=$arSchool['NAME']?></b></a>
                    </td>
                <? } ?>
                <td align="center"><?=$arItem['PROPERTY_DATES_VALUE']?></td>
                <td align="center"><?=$arItem['PROPERTY_AGE_VALUE']?></td>
                <td align="center"><?=$arItem['PROPERTY_PRICE_VALUE']?></td>
                <td align="center"><?=$arItem['PROPERTY_ACCOMODATION_VALUE']?></td>
            </tr>
        <? endforeach ?>
    </table>
<? endif ?>

<? if ($arResult['SECTION']['UF_SUBSECTIONS_VIEW'] == 1): ?>
    <div class="img_list clearfix">
<? endif ?>

<? foreach ($arResult['SECTIONS'] as $arRootSection): ?>
    <? if ($arResult['SECTION']['UF_SUBSECTIONS_VIEW'] == 1): ?>
        <a href="<?=$arRootSection['SECTION_PAGE_URL']?>" class="img_list-item">
            <!--<span class="news_carousel-content"><span class="news_carousel-title">Пробный IELTS</span></span>-->
            <img src="<?=$arRootSection['PICTURE_RESIZED']['src']?>" height="195" width="288"
                 alt="<?=$arRootSection['NAME']?>"></a>

    <? else: ?>
        <h2><?=$arRootSection['NAME']?></h2>
        <?=$arRootSection['DESCRIPTION']?>
        <? if (is_array($arRootSection['SECTIONS']) && count($arRootSection['SECTIONS'])): ?>
            <div class="img_list clearfix">
                <? foreach ($arRootSection['SECTIONS'] as $arSection): ?>
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="img_list-item">
                        <!--<span class="news_carousel-content"><span class="news_carousel-title">Пробный IELTS</span></span>-->
                        <img src="<?=$arSection['PICTURE_RESIZED']['src']?>" height="195" width="288"
                             alt="<?=$arSection['NAME']?>"></a>
                <? endforeach ?>
            </div>
        <? else: ?>

            <? if (isset($arRootSection['ITEMS']) && is_array($arRootSection['ITEMS']) && count($arRootSection['ITEMS'])): ?>
                <table class="scroll-table">
                    <tr>
                        <?
                            $colsPan = 1;
                            foreach ($arRootSection['ITEMS'] as $arItem) {
                                $arSchool = $arResult['SCHOOLS'][$arItem['PROPERTY_SCHOOL_VALUE']];
                                if ( ! empty($arSchool)) {
                                    $colsPan = 2;
                                }
                            }
                        ?>
                        <th colspan="<?=$colsPan?>">наименование и местоположение</th>
                        <th>даты</th>
                        <th>стоимость</th>
                        <th>Проживание</th>
                    </tr>
                    <? foreach ($arRootSection['ITEMS'] as $arItem): ?>
                        <?
                        $arSchool = $arResult['SCHOOLS'][$arItem['PROPERTY_SCHOOL_VALUE']];
                        ?>
                        <tr>
                            <td width="168" class="table_img">
                                <div class="table_img-item"><img src="<?=$arItem['PICTURE_RESIZED']['src']?>"
                                                                 alt="<?=$arSchool['NAME']?>"></div>
                            </td>
                            <? if ( ! empty($arSchool['DETAIL_PAGE_URL'])) { ?>
                                <td align="center"><a
                                            href="<?=$arSchool['DETAIL_PAGE_URL']?>"><b><?=$arSchool['NAME']?></b></a>
                                </td>
                            <? } ?>
                            <td align="center"><?=$arItem['PROPERTY_DATES_VALUE']?></td>
                            <td align="center"><?=$arItem['PROPERTY_PRICE_VALUE']?></td>
                            <td align="center"><?=$arItem['PROPERTY_ACCOMODATION_VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                </table>
            <? endif ?>

        <? endif ?>
    <? endif ?>
<? endforeach ?>

<? if ($arResult['SECTION']['UF_SUBSECTIONS_VIEW'] == 1): ?>
    </div>
<? endif ?>
