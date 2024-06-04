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




<section class="p60 usp">
    <div class="container">
        <div class="why-us">
            <div>
                <h2 class="new-base">
                    <?echo $arResult['NAME']?>
                </h2>

                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <button class="accordion" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <?echo $arItem["NAME"]?>
                    </button>
                    <div class="panel">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </div>
                <?endforeach;?>
            </div>
            <div class="img-div">
                <img src="<?echo $templateFolder?>/img/why-us.jpg" alt="">
            </div>
        </div>
    </div>
</section>







