<?
	if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
<div class="banner_arrows"><a href="#prev"></a><a href="#next"></a></div>
<div class="main_slider clearfix" id="slider">
	<?
		foreach ($arResult["ITEMS"] as $key => $arItem) {
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
				CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
				CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

            <div class="banner_slider banner_slider-mobile <?=$key !== 0 ? "invisible" : ""?>"
                 id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?
					if ( ! empty($arItem['PROPERTIES']['LINK']['VALUE'])) { ?>
                        <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" rel="nofollow" class="banner_slider-link"></a>
					<? }
				?>
                <div class="banner_slide-content">
                    <div class="container clearfix">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-2 col-lg-6 col-md-8 col-lg-offset-1 col-md-offset-1">
                                <div class="banner_title"><? echo $arItem["NAME"] ?></div>
                                <?=$arItem["PREVIEW_TEXT"];?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="banner_slider-mask banner_slider-img"
                     style="background:url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')"></div>
                <div class="banner_slider-mask"></div>
            </div>
		<? }
	?>
</div>
