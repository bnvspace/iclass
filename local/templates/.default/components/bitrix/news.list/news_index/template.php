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
    $obParser = new CTextParser;
?>
<div class="col-lg-7 col-lg-offset-1  col-md-7 col-md-offset-1 col-xs-15 index_news-block">
    <h2 class="clearfix"><span class="left">новости</span>
        <div class="left slide_arrows news_arrows-carousel"><a href="#prev"></a><a href="#next"></a></div>
    </h2>
    <div class="clearfix news_carousel">
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <?
            if ( ! empty($arItem['PROPERTIES']['TITLE_SHORT']['VALUE'])) {
                $title = $arItem['PROPERTIES']['TITLE_SHORT']['VALUE'];
            } else {
                $title = $obParser->html_cut($arItem["NAME"], 110);
            }
            if ( ! empty($arItem['~DETAIL_PICTURE'])) {
                $picture = CFile::ResizeImageGet($arItem['~DETAIL_PICTURE'], array('width' => 270, 'height' => 210),
                    BX_RESIZE_IMAGE_EXACT);
            } else {
                $picture = array('src' => '/bitrix/media/images/news-empty-light.jpg');
            }
            ?>
            <div class="news_item">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"
                   <? if ( ! empty($arItem['~DETAIL_PICTURE'])): ?>class="light"<? endif ?>>
		<span class="news_carousel-content">
			<span class="news_carousel-title"><?=$title?></span>
<!--			<b>--><?//=$arItem['DISPLAY_ACTIVE_FROM']?><!--</b>-->
<!--			<p>--><?//=$arItem['PREVIEW_TEXT']?><!--</p>-->
		</span>
                    <span class="news-mask"></span>
                    <img src="<?=$picture['src']?>" alt="" height="210" width="270">
                </a>
            </div>
        <? endforeach ?>
    </div>
</div>
