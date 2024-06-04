<? $picture = CFile::ResizeImageGet($arResult['ITEM']['DETAIL_PICTURE'], array('width' => 300, 'height' => 192)); ?>
<div class="about_block">
    <!--<div class="link_list"><span><a href="#">Подготовка к университету</a><a href="#">Бакалавриат</a><a href="#">магистратура</a><a href="#">МВА</a></span></div>-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-7 about_img"><? if ( ! empty($arResult['ITEM']['DETAIL_PICTURE'])): ?>
                    <img src="<?=$picture['src']?>" alt="" height="192" width="300"><? endif ?></div>
            <div class="col-lg-11 col-md-10 col-sm-8">
                <?=$arResult['ITEM']['DETAIL_TEXT']?>
            </div>
        </div>
    </div>
</div>