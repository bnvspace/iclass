<?
    if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }
    /**
     * Bitrix vars
     *
     * @var array $arParams
     * @var array $arResult
     * @var CBitrixComponentTemplate $this
     * @global CMain $APPLICATION
     * @global CUser $USER
     */
?>
<div class="mfeedback">
    <div id="start_errors" hidden></div>
    <? if ( ! empty($arResult["ERROR_MESSAGE"])) {
        foreach ($arResult["ERROR_MESSAGE"] as $v) {
            ShowError($v);
        }
    }
        if (strlen($arResult["OK_MESSAGE"]) > 0) {
            ?>
            <span class='success-ajax-submit'><?=$arResult["OK_MESSAGE"]?></span>
            <div id="end_errors" hidden></div>
            <div id="form_submit_errors" hidden></div><?
        } else {
            ?>
            <div id="end_errors" hidden></div>
            <div id="form_submit_errors" hidden></div>

            <form action="<?=POST_FORM_ACTION_URI?>" method="POST" id="form_<?=$arResult['PARAMS_HASH']?>">
                <?=bitrix_sessid_post()?>
                <? if ( ! empty($arResult["FIELDS"])) {
                    foreach ($arResult["FIELDS"] as $FIELD) { ?>
                        <div class="mf-field">
                            <div class="mf-text">
                                <?=
                                    GetMessage("MFT_" . $FIELD);
                                    if (in_array($FIELD, $arParams["REQUIRED_FIELDS"], true)) {
                                        echo '<span class="mf-req">*</span>';
                                    }
                                ?>
                            </div>
                            <p>
                                <input type="text" name="<?=$FIELD?>" value="<?=$arResult[$FIELD]?>">
                            </p>
                        </div>
                    <? }
                } ?>
                <? if ($arResult["USE_SUBMIT_FOR_PERSONAL_DATA"] === "Y") {
                    ?>
                    <div class="mf-personal-data">
                        <input type="checkbox"
                               name="PERSONAL_DATA">
                        <?=
                            GetMessage("MFT_PERSONAL_DATA") . '<span class="mf-req">*</span>';
                        ?>
                        <div id="checkbox-error-dialog"></div>
                    </div>
                <? } ?>
                <? if ($arParams["USE_CAPTCHA"] == "Y") { ?>
                    <div class="mf-captcha">
                        <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
                        <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180"
                             height="40"
                             alt="CAPTCHA">
                        <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
                        <input type="text" name="captcha_word" size="30" maxlength="50" value="">
                    </div>
                <? } ?>
                <? if ($arParams["USE_G_RECAPTCHA"] == "Y") { ?>
                    <div class="mf-captcha">
                        <label class="name captcha">
                            <div id="recaptcha">
                                <p>
                                    <input id="recaptcha-input" name="RECAPTCHA" hidden>
                                </p>
                            </div>
                            <noscript>
                                <div>
                                    <div class="iframe-container">
                                        <div class="iframe-container-2">
                                            <iframe src="https://www.google.com/recaptcha/api/fallback?k=<?=RE_SITE_KEY?>"
                                                    frameborder="0" scrolling="no"
                                                    class="iframe"
                                            >
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="recaptcha-textarea-container">
                                                <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                          class="g-recaptcha-response recaptcha-textarea">
                                                </textarea>
                                    </div>
                                </div>
                            </noscript>
                        </label>
                    </div>
                <? } ?>
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <input type="hidden" name="AJAX_MODE" value="N">
                <input type="submit" name="submit" id="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
            </form>
        <? } ?>
</div>