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
    <div class="link_list js-pageContentSwitcher"><span>
<?
    $i = 0;
?>
            <? foreach ($arResult['SECTIONS'] as $arSection): ?>
                <a href="#sectionBlock_<?=$arSection['ID']?>" data-section="<?=$arSection['ID']?>"
                   <? if ($i == 0): ?>class="selected"<? endif ?>><?=$arSection['NAME']?></a>
                <? $i++; ?>
            <? endforeach ?>
</span></div>
<? endif ?>

<script>
    $(function () {
        $('.js-pageContentSwitcher a').on('click', function (e) {
            $('.js-PageContent').hide();
            $this = $(this);
            $this.addClass('selected').siblings('a').removeClass('selected');
            $($this.attr('href')).fadeIn(function () {
                //var container = document.querySelector($this.attr('href'));
                //console.log($this.attr('href'));
                //console.log(container);
                //var msnry = new Masonry( container, {itemSelector: '.links_block', transitionDuration: 0});
            }).siblings('div.js-PageContent').fadeOut();
            e.preventDefault();
        });
    })
</script>