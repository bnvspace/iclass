<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

//print_r($arParams["REQUIRED_FIELDS"]);
?>
<section class="footer-form-sec">
    <div class="container">
        <div class="footer-form-div">
            <div class="left">
                <p class="title">Остались вопросы?<br>Задайте их нам!</p>
                <p class="desc">
                    Санкт-Петербург, ул. Льва Толстого, д. 9.
                    <a href="tel:+7 (812) 244-99-64">+7 (812) 244-99-64 </a>
                    <a href="tel:+7 (800) 550-84-33">+7 (800) 550-84-33</a>
                    (звонок бесплатный по всей России)
                </p>
                <?php $photoId = mt_rand(1, 3); ?>
                <img src="<?= $templateFolder; ?>/img/<?= $photoId; ?>.png" alt="" class="footer-form-women">
            </div>
            <div class="right">
                <div class="footer-form" id="dialog-content">
                    <?php if (!empty($arResult["ERROR_MESSAGE"])) : ?>
                        <?php foreach ($arResult["ERROR_MESSAGE"] as $v) : ?>
                            <?php ShowError($v); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php $isOk = strlen($arResult["OK_MESSAGE"]) > 0; ?>
                    <?php if ($isOk) : ?>
                        <span class='success-ajax-submit'><?= $arResult["OK_MESSAGE"] ?></span>
                        <div id="end_errors" hidden></div>
                        <div id="form_submit_errors" hidden></div>
                    <?php endif; ?>
                    <form action="<?= POST_FORM_ACTION_URI; ?>" method="POST" id="form_<?= $arResult['PARAMS_HASH'] ?>">
                        <?= bitrix_sessid_post() ?>
                        <?php if (!empty($arResult["FIELDS"])) : ?>
                            <?php foreach ($arResult["FIELDS"] as $FIELD) : ?>
                                <?php $placeholder = GetMessage("MFT_" . $FIELD); ?>
                                <?php $is_required = in_array($FIELD, $arParams["REQUIRED_FIELDS"], true); ?>

                                <div class="mfask-field <?=$FIELD?>-mfask-field" id="<?=$FIELD?>-mfask-field">
                                    <?php if ($FIELD != 'MESSAGE') : ?>
                                        <input
                                            type="text"
                                            name="<?= $FIELD ?>"
                                            value="<?= $arResult[$FIELD] ?>"
                                            placeholder="<?= $placeholder; ?><?php if ($is_required) echo '*'; ?>">
                                    <?php else:  ?>
                                        <textarea
                                            name="<?= $FIELD ?>"
                                            id=""
                                            rows="6"
                                            placeholder="<?= $placeholder; ?><?php if ($is_required) echo '*'; ?>"><?= $arResult[$FIELD] ?></textarea>
                                    <?php endif; ?>
                                    <div id="<?= $FIELD ?>-error-dialog" class="error-dialog"></div>
                                </div>
                            <?php endforeach; ?>
                            <input
                                type="hidden"
                                name="PAGE_NAME"
                                value=" Со страницы: <?= $APPLICATION->GetTitle() ?>">
                        <?php endif; ?>

                        <?php if ($arResult["USE_SUBMIT_FOR_PERSONAL_DATA"] === "Y") : ?>
                            <div class="mfask-field PERSONAL_DATA-mfask-field">
                                <div class="policy-div">
                                    <input type="checkbox" id="policy" name="PERSONAL_DATA" required="" checked="checked">
                                    <label for="policy">
                                        <?= GetMessage("MFT_PERSONAL_DATA") ?>
                                    </label>
                                </div>
                                <div id="checkbox-error-dialog" class="error-dialog"></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($arParams["USE_G_RECAPTCHA"] == "Y") : ?>
                            <div class="mfask-field mfask-recaptcha">
                                <input id="recaptcha-input" name="RECAPTCHA" hidden>
                                <noscript>
                                    <div>
                                        <div class="iframe-container">
                                            <div class="iframe-container-2">
                                                <iframe src="https://www.google.com/recaptcha/api/fallback?k=<?= RE_SITE_KEY ?>"
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
                                <div id="RECAPTCHA-error-dialog" class="error-dialog"></div>
                            </div>
                        <?php endif; ?>

                        <button type="submit" name="submit"><?= GetMessage("MFT_SUBMIT") ?></button>

                        <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
                        <input type="hidden" name="AJAX_MODE" value="N">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

