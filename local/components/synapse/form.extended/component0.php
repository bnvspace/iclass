<?php
    if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }
    require_once(__DIR__ . "/include/autoload.php");

    /**
     * Bitrix vars
     *
     * @var array $arParams
     * @var array $arResult
     * @var CBitrixComponent $this
     * @global CMain $APPLICATION
     * @global CUser $USER
     */

    $arResult["PARAMS_HASH"]                  = md5(serialize($arParams) . $this->GetTemplateName());
    $arResult["FIELDS"]                       = $arParams["FIELDS"];
    $arResult["USE_SUBMIT_FOR_PERSONAL_DATA"] = ($arParams["USE_SUBMIT_FOR_PERSONAL_DATA"] != "N") ? "Y" : "N";

    $arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && ! $USER->IsAuthorized()) ? "Y" : "N");
    $arParams["EVENT_NAME"]  = trim($arParams["EVENT_NAME"]);
    $arParams["OK_TEXT"]     = trim($arParams["OK_TEXT"]);
    if ($arParams["OK_TEXT"] == '') {
        $arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' &&
        ( ! isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"])
    ) {
        $arResult["ERROR_MESSAGE"] = array();
        if (check_bitrix_sessid()) {
            if ( ! empty($arParams["REQUIRED_FIELDS"])) {
                foreach ($arParams["REQUIRED_FIELDS"] as $REQUIRED_FIELD) {
                    if (empty($_POST[$REQUIRED_FIELD])) {
                        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_" . $REQUIRED_FIELD);
                    }
                }
            }
            if ($arParams["USE_CAPTCHA"] === "Y") {
                include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/captcha.php");
                $captcha_code = $_POST["captcha_sid"];
                $captcha_word = $_POST["captcha_word"];
                $cpt          = new CCaptcha();
                $captchaPass  = COption::GetOptionString("main", "captcha_password", "");
                if (strlen($captcha_word) > 0 && strlen($captcha_code) > 0) {
                    if ( ! $cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass)) {
                        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
                    }
                } else {
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");
                }
            }

            if ($arParams["USE_G_RECAPTCHA"] === "Y") {
                $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
                if ( ! empty($_REQUEST["g-recaptcha-response"])) {
                    $resp = $recaptcha->verify($_REQUEST["g-recaptcha-response"], $_SERVER['REMOTE_ADDR']);
                }
                if (empty($_REQUEST["g-recaptcha-response"]) || ! $resp->isSuccess()) {
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_RECAPTHCA_WRONG");;
                }
            }
            if ($arParams["USE_SUBMIT_FOR_PERSONAL_DATA"] === "Y") {
                if ($_POST["PERSONAL_DATA"] !== "on") {
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_PERSONAL_DATA_EMPTY");
                }
            }
            if (empty($arResult["ERROR_MESSAGE"])) {
                if ($arParams["SEND_MAIL"] === "Y") {
                    $arFields = Array(
                        "EMAIL_TO" => $arParams["EMAIL_TO"],
						    "AUTHOR" => $_POST["NAME"],
					  "AUTHOR_EMAIL" => $_POST["EMAIL"],
					  
					    "TEXT" => $_POST["MESSAGE"],
                    );
                    if ( ! empty($arParams["SEND_FIELDS"])) {
                        foreach ($arParams["SEND_FIELDS"] as $uf_field) {
                            if ( ! empty($_POST[$uf_field])) {
                                if ($_POST["AJAX_MODE"] === "Y") {
                                    $arFields[ToUpper($uf_field)] = iconv('utf-8', 'windows-1251', $_POST[$uf_field]);
                                } else {
                                    $arFields[ToUpper($uf_field)] = $_POST[$uf_field];
                                }
                            }
                        }
                    }
                    if ( ! empty($arParams["EVENT_MESSAGE_ID"])) {
                        foreach ($arParams["EVENT_MESSAGE_ID"] as $v) {
                            if (IntVal($v) > 0) {
                                CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", IntVal($v));
                            }
                        }
                    } else {
                        CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
                    }
                }

                if ($_POST["AJAX_MODE"] !== "Y") {
                    LocalRedirect($APPLICATION->GetCurPageParam("success=" . $arResult["PARAMS_HASH"],
                        Array("success")));
                }
            }
        } else {
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
        }
    } elseif ($_REQUEST["success"] == $arResult["PARAMS_HASH"]) {
        $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
    }

    if ($arParams["USE_CAPTCHA"] == "Y") {
        $arResult["capCode"] = htmlspecialcharsbx($APPLICATION->CaptchaGetCode());
    }

    $this->IncludeComponentTemplate();
