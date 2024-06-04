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
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet'
          type='text/css' data-noprefix>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="/favicon.ico" rel="icon"
          type="image/x-icon"/><? /*<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css' data-noprefix>*/ ?>
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
    ); ?>

    <script>
        jQuery(document).ready(function () {
            jQuery("img").each(function () {

                jQuery('img').attr('alt', jQuery('h1').html());

            });
        });
    </script>
    <style>
        ul li p {
            display: inline !important;
        }
    </style>

    <?php
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
    <section class="content">
        <div class="container">
            <div class="content_line-top"></div>
            <div class="content_line-bottom"></div>
            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "",
                Array(
                    "START_FROM" => "1",
                    "PATH"       => "",
                    "SITE_ID"    => "-"
                )
            ); ?>
            <div class="row">
                <div class="col-lg-11 col-md-11 col-xs-15">
<? $APPLICATION->IncludeComponent(
    "bitrix:menu",
    "internal",
    array(
        "ROOT_MENU_TYPE"        => "left",
        "MENU_CACHE_TYPE"       => "A",
        "MENU_CACHE_TIME"       => "3600",
        "MENU_CACHE_USE_GROUPS" => "N",
        "MENU_CACHE_GET_VARS"   => array(),
        "MAX_LEVEL"             => "1",
        "CHILD_MENU_TYPE"       => "left",
        "USE_EXT"               => "N",
        "DELAY"                 => "N",
        "ALLOW_MULTI_SELECT"    => "N",
        "COMPONENT_TEMPLATE"    => "internal"
    ),
    false
); ?>
