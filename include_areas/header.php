<?php
// Получение текущего URL
$currentUrl = $APPLICATION->GetCurPage(false);

// URL, при переходе по которому нужно сделать редирект
$redirectUrl = '/language/trial-calculator.php';

// Проверка, является ли текущий URL тем, при переходе по которому нужно сделать редирект
if ($currentUrl === $redirectUrl) {
    // Редирект на главную страницу
    LocalRedirect('/');
}
?>
<div class="top_menu">
    <div class="container clearfix">
        <ul class="no-list left-list left">
            <li><a href="https://www.iclass-study.ru/" rel="nofollow" class="js-ga-centr_ino">школа иностранных
                    языков</a></li>
            <li><a href="https://www.iclass.ru/language/" class="js-ga-corp_study">программы</a></li>
            <li><a href="https://www.iclass-study.ru/corporate" class="js-ga-corp_study" rel="nofollow">корпоративное обучение</a></li>
        </ul>
        <div class="social_links right tab-hide phone-hide">

            <a target="_blank" href="https://vk.com/iclass" rel="nofollow" class="vk_icon"
               style="width: 19px; background-position: 1px 0;"></a>
            <a target="_blank" href="https://www.instagram.com/iclass_spb/" rel="nofollow" class="vk_icon" style="background-position: -18px 0;
    width: 16px;"></a>
            <a target="_blank" href="https://www.facebook.com/iclass.ru" rel="nofollow" class="fb_icon" style="background-position: -33px 0;
    width: 18px;"></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCEqEZglRL0cD24bObA0W2wg" rel="nofollow"
               class="fb_icon" style="background-position: -50px 0;
    width: 18px;"></a>
            <a target="_blank" href="https://t.me/iclassSPB" rel="nofollow" class="tw_icon"
               style="background-position: -66px 0;"></a>

        </div>
        <a href="#" class="top_menu-button phone-show"><i></i></a>
    </div>
</div>
<header class="top">
    <div class="container clearfix">
        <div class="left logo">
            <? if (isStartPage()): ?>
                <img src="/bitrix/media/images/logo.png" height="125" width="255" alt="" class="phone-hide">
                <img src="/bitrix/media/images/logo-mobile.png" height="85" width="173" alt="" class="phone-show">
            <? else: ?>
                <a href="/"><img src="/bitrix/media/images/logo.png" height="65" width="133" alt=""
                                 class="phone-hide"><img src="/bitrix/media/images/logo-mobile.png" height="85"
                                                         width="173" alt="" class="phone-show"></a>
            <? endif; ?>
        </div>
        <div class="right header_info col-md-10 phone-hide">
            <? if (isStartPage()): ?>
                <form class="search_small" action="/search/">
                    <input type="text" value="" name="q" placeholder="Поиск"><input type="submit" value="">
                </form>
            <? endif ?>
            <!--				--><?php // if (isStartPage()):?>
            <address class="text-right header_address">
                <?php $APPLICATION->IncludeFile(
                    '/include_areas/contacts_header.php',
                    array(),
                    array("MODE" => "html")
                ); ?>
            </address>
            <!--				--><?php //else:?>
            <!--				<address class="text-right header_address">-->
            <? // $APPLICATION->IncludeFile('/include_areas/contacts_header_inner.php', Array(), Array("MODE"=> "html"));?><!--</address>-->
            <!--				--><?php //endif?>
        </div>
        <a href="#" class="right phone_menu-icon phone-show"><i></i></a>
    </div>
</header>
<section class="main_menu">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "main_menu",
            array(
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array(),
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "COMPONENT_TEMPLATE" => "main_menu"
            ),
            false
        ); ?>
    </div>
</section>
<section class="main_banner">
    <? if (isStartPage()): ?>
        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
            "AREA_FILE_SHOW" => "sect",
            "AREA_FILE_SUFFIX" => "banner",
            "AREA_FILE_RECURSIVE" => "Y",
            "EDIT_TEMPLATE" => ""
        ),
            false
        ); ?>
    <? else: ?>
        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
            "AREA_FILE_SHOW" => "sect",
            "AREA_FILE_SUFFIX" => "inner_banner",
            "AREA_FILE_RECURSIVE" => "Y",
            "EDIT_TEMPLATE" => ""
        ),
            false
        ); ?>
    <? endif; ?>
</section>
<section class="menu">
    <?php if (!isStartPage()): ?>
        <div class="menu_block-sub none" id="menuSubProf">
            <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sub_menu", array(
                "IBLOCK_TYPE" => "learning",    // Тип инфоблока
                "IBLOCK_ID" => "15",    // Инфоблок
                "SECTION_ID" => $_REQUEST["SECTION_ID"],    // ID раздела
                "SECTION_CODE" => "",    // Код раздела
                "COUNT_ELEMENTS" => "N",    // Показывать количество элементов в разделе
                "TOP_DEPTH" => "1",    // Максимальная отображаемая глубина разделов
                "SECTION_FIELDS" => array(    // Поля разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_USER_FIELDS" => array(    // Свойства разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_GROUPS" => "N",    // Учитывать права доступа
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "VIEW_MODE" => "LINE",    // Вид списка подразделов
                "SHOW_PARENT_NAME" => "Y",    // Показывать название раздела
            ),
                false
            ); ?>
        </div>
        <div class="menu_block-sub none" id="menuSubHigh">
            <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sub_menu", array(
                "IBLOCK_TYPE" => "learning",    // Тип инфоблока
                "IBLOCK_ID" => "13",    // Инфоблок
                "SECTION_ID" => $_REQUEST["SECTION_ID"],    // ID раздела
                "SECTION_CODE" => "",    // Код раздела
                "COUNT_ELEMENTS" => "N",    // Показывать количество элементов в разделе
                "TOP_DEPTH" => "1",    // Максимальная отображаемая глубина разделов
                "SECTION_FIELDS" => array(    // Поля разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_USER_FIELDS" => array(    // Свойства разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_GROUPS" => "N",    // Учитывать права доступа
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "VIEW_MODE" => "LINE",    // Вид списка подразделов
                "SHOW_PARENT_NAME" => "Y",    // Показывать название раздела
            ),
                false
            ); ?>
        </div>
        <div class="menu_block-sub none" id="menuSubMiddle">
            <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sub_menu", array(
                "IBLOCK_TYPE" => "learning",    // Тип инфоблока
                "IBLOCK_ID" => "14",    // Инфоблок
                "SECTION_ID" => $_REQUEST["SECTION_ID"],    // ID раздела
                "SECTION_CODE" => "",    // Код раздела
                "COUNT_ELEMENTS" => "N",    // Показывать количество элементов в разделе
                "TOP_DEPTH" => "1",    // Максимальная отображаемая глубина разделов
                "SECTION_FIELDS" => array(    // Поля разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_USER_FIELDS" => array(    // Свойства разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_GROUPS" => "N",    // Учитывать права доступа
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "VIEW_MODE" => "LINE",    // Вид списка подразделов
                "SHOW_PARENT_NAME" => "Y",    // Показывать название раздела
            ),
                false
            ); ?>
        </div>
        <div class="menu_block-sub none" id="menuSubLang">
            <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sub_menu", array(
                "IBLOCK_TYPE" => "learning",    // Тип инфоблока
                "IBLOCK_ID" => "19",    // Инфоблок
                "SECTION_ID" => $_REQUEST["SECTION_ID"],    // ID раздела
                "SECTION_CODE" => "",    // Код раздела
                "COUNT_ELEMENTS" => "N",    // Показывать количество элементов в разделе
                "TOP_DEPTH" => "1",    // Максимальная отображаемая глубина разделов
                "SECTION_FIELDS" => array(    // Поля разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_USER_FIELDS" => array(    // Свойства разделов
                    0 => "",
                    1 => "",
                ),
                "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_GROUPS" => "N",    // Учитывать права доступа
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "VIEW_MODE" => "LINE",    // Вид списка подразделов
                "SHOW_PARENT_NAME" => "Y",    // Показывать название раздела
            ),
                false
            ); ?>
        </div>
    <?php endif; ?>
    <?php if (isStartPage()): ?>
        <div class="container no-padding">
            <div class="menu_block row">
                <div class="col-md-3 col-lg-3 col-sm-5 col-xs-15 menu_block-item no-padding">
<!--                    clearfix js-bigMenu-->
                    <a href="/language/" data-target="#menuSubLang" class="clearfix">
                        <div class="menu_icons"><i class="lng_icon"></i></div>
                        <span>ЯЗЫКОВЫЕ ПРОГРАММЫ</span>
                    </a>
                    <div class="menu_block-hover top_lines bottom_lines">
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-15 col-sm-5 menu_block-item no-padding">
                    <a href="/secondary-education/" class="clearfix" data-target="#menuSubMiddle">
                        <div class="menu_icons"><i class="edu_icon"></i></div>
                        <span>Среднее образование</span>
                    </a>
                    <div class="menu_block-hover bottom_lines-right"></div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-15 col-sm-5 menu_block-item no-padding">
                    <a href="/higher-education/" data-target="#menuSubHigh" class="clearfix">
                        <div class="menu_icons"><i class="hight_icon"></i></div>
                        <span>ВЫСШЕЕ ОБРАЗОВАНИЕ</span>
                    </a>
                    <div class="menu_block-hover top_lines"></div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-5 col-xs-15 menu_block-item no-padding">
                    <a href="/professional/" class="clearfix" data-target="#menuSubProf">
                        <div class="menu_icons"><i class="prof_icon"></i></div>
                        <span>Профессиональные курсы</span>
                    </a>
                    <div class="menu_block-hover bottom_lines-right"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</section>
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW" => "page",
    "AREA_FILE_SUFFIX" => "inc",
    "AREA_FILE_RECURSIVE" => "Y",
    "EDIT_TEMPLATE" => ""
),
    false
); ?>