<?

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addString('<script src="' . $templateFolder .
                                    '/js/jquery.form.js"></script>', true);
    Asset::getInstance()->addString('<script src="' . $templateFolder .
                                    '/js/punycode.min.js"></script>', true);
    Asset::getInstance()->addString('<script src="' . $templateFolder .
                                    '/js/form-validator/jquery.form-validator.js"></script>', true);
    Asset::getInstance()->addString('<script src="' . $templateFolder .
                                    '/js/jquery.inputmask.js"></script>', true);

?>
<script>
    var RE_SITE_KEY = "<?=RE_SITE_KEY?>";
    var FORM_ID = "<?=$arResult['PARAMS_HASH']?>";
    var SUCCESS_MESSAGE = "<?=$arParams['OK_TEXT']?>"
</script>