<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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


<section class="p60 reviews-sec">
    <div class="container">
        <h2 class="new-base">
            <?echo $arResult['NAME']?>
            <div class="rev-arrows">
                <a href="#prev"></a><a href="#next"></a>
            </div>
        </h2>

        <div class="owl-carousel-reviews owl-theme">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
//            echo '<pre>';
//            var_dump();
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="rev-item">
                        <div class="rev-header">
                            <img src="<?echo $arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?echo $arItem["NAME"]?>">
                            <div class="info">
                                <div class="name-date">
                                    <?echo $arItem["NAME"]?>
                                    <span>
                                        <?//echo FormatDate("d.m.y", MakeTimeStamp($arItem['PROPERTIES']['DATE']['VALUE']))?>
                                        <?echo FormatDate("d.m.y", MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']))?>
                                    </span>
                                </div>
                                <div class="desc">
                                    <?echo $arItem['PROPERTIES']['UNIVERSITY']['VALUE']?>
                                </div>
                            </div>
                        </div>
                        <p class="desc">
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        </p>
                        <a href="/information/responses/" class="link">Читать отзыв</a>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>







