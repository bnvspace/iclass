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

<section class="p60 services-sec">
    <div class="container">
        <h2 class="new-base">
            <?echo $arResult['NAME']?>
        </h2>

        <div class="services-div">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>

                <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <p class="title">
                        <img src="<?
                            if(isset($arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']) && !empty($arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'])) {
                                echo $arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'];
                            } else {
                                echo '/bitrix/media/images/logo.png';
                            }
                        ?>" alt="<?echo $arItem["NAME"]?>"/>
                        <?echo $arItem["NAME"]?>
                    </p>

                    <p class="desc">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </p>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>
