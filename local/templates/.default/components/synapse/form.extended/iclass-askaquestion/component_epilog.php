<?

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addJs($templateFolder . "/js/jquery.form.js");
    Asset::getInstance()->addJs($templateFolder . '/js/punycode.min.js');
    Asset::getInstance()->addString('<script src="' . $templateFolder . '/js/form-validator/jquery.form-validator.js"></script>', true);
    Asset::getInstance()->addJs($templateFolder . '/js/jquery.inputmask.js');
    Asset::getInstance()->addCss($templateFolder . '/style.css');


?>
<script>
    var RE_SITE_KEY = "<?=RE_SITE_KEY?>";
    var FORM_ID = "<?=$arResult["PARAMS_HASH"]?>";
    var SUCCESS_MESSAGE = "<?= addslashes($arParams["OK_TEXT"])?>"
</script>
