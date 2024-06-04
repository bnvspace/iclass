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
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GSGGCQV7P1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GSGGCQV7P1');
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, target-densitydpi=medium-dpi">
    <title><? $APPLICATION->ShowTitle() ?></title>
<link rel="canonical" href="<?= htmlspecialcharsbx($APPLICATION->GetPageProperty('canonical')) ?>">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <script src="/bitrix/media/js/library.js"></script>
    <script src="/bitrix/media/js/respond.min.js"></script>
    <script src="/bitrix/media/js/lib/owl.carousel.min.js"></script>
    <link href="/bitrix/media/css/normalize.css" rel="stylesheet">
    <link href="/bitrix/media/css/owl.carousel.css" rel="stylesheet">
    <link href="/favicon.ico" rel="icon" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=latin,cyrillic' rel='stylesheet'
          type='text/css' data-noprefix>

    <link href="/bitrix/media/css/jquery.fancybox.css" rel="stylesheet">
    <link href="/bitrix/media/css/base.css" rel="stylesheet">
    <link href="/bitrix/media/css/style.css" rel="stylesheet">
    <link href="/bitrix/media/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="/local/templates/.default/css/font-awesome.min.css">

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

    <?
        Asset::getInstance()->addJs("/local/js/masonry.pkgd.min.js");
        $APPLICATION->ShowHead();
    ?>

<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "iclass",
  "url": "https://www.iclass.ru/",
  "logo": "https://www.iclass.ru/bitrix/media/images/logo.png",
  "description": "ПОМОЩЬ В ОБУЧЕНИИ ЗА ГРАНИЦЕЙ С 1998 ГОДА",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Петроградская сторона, Малый проспект, д.3",
    "postOfficeBoxNumber": "iclass@iclass.ru",
    "addressLocality": "Санкт-Петербург",
    "postalCode": "197198",
    "addressCountry": "Россия"
  },
  "hasMap": "https://goo.gl/maps/ya989QRjQdufW2vR6",
  "openingHours": "Mo, Tu, We, Th, Fr 10:30-19:00",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+78122449964"
  }
}
 </script>

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
