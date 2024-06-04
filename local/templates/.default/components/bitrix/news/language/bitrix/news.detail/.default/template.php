count<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (!empty($arResult['PICTURES_RESIZED'])): ?>
    <div class="img_list clearfix">
        <? foreach ($arResult['PICTURES_RESIZED'] as $img): ?>
            <a class="img_list-item fancybox" data-fancybox-type="image" href="<?=$img['big']['src']?>"><img
                        src="<?=$img['small']['src']?>" height="<?=$img['small']['height']?>"
                        width="<?=$img['small']['width']?>"></a>
        <? endforeach ?>
    </div>
<? endif ?>

<?=$arResult['DETAIL_TEXT']?>