<?
    if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
    }

    use Bitrix\Main\Page\Asset;

?>
<!DOCTYPE HTML>
<!--[if IE 7 ]>
<html id="ie7" class="no-js"> <![endif]-->
<!--[if IE 8 ]>
<html id="ie8" class="no-js"> <![endif]-->
<!--[if IE 9 ]>
<html id="ie9" class="no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js"><!--<![endif]-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, target-densitydpi=medium-dpi">
    <title><? $APPLICATION->ShowTitle() ?></title>

    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="/favicon.ico" rel="icon" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet'
          type='text/css' data-noprefix>

    <script src="/bitrix/media/js/library.js"></script>
    <script src="/bitrix/media/js/respond.min.js"></script>
    <script src="/bitrix/media/js/lib/owl.carousel.min.js"></script>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/normalize.css") ?>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/owl.carousel.css") ?>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/jquery.fancybox.css") ?>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/base.css") ?>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/style.css") ?>
    <? $APPLICATION->SetAdditionalCSS("/bitrix/media/css/responsive.css") ?>

    <!--[if IE]>
    <link href="/bitrix/media/css/base-ie.css" rel="stylesheet" type="text/css">
    <script data-skip-moving="true" src="/bitrix/media/js/library-ie.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
        today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
        better experience this site.</p>
    <![endif]-->

    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
        "AREA_FILE_SHOW"      => "sect",
        "AREA_FILE_SUFFIX"    => "header_analytics",
        "AREA_FILE_RECURSIVE" => "Y",
        "EDIT_TEMPLATE"       => ""
    ),
        false
    );
        Asset::getInstance()->addJs("/local/js/masonry.pkgd.min.js");
        $APPLICATION->ShowHead();
    ?>
</head>
<body>
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW"      => "sect",
    "AREA_FILE_SUFFIX"    => "google_tag_manager",
    "AREA_FILE_RECURSIVE" => "Y",
    "EDIT_TEMPLATE"       => ""
),
    false
); ?>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="page">
    <? $APPLICATION->IncludeFile('/include_areas/header.php', Array(), Array("SHOW_BORDER" => false)); ?>

