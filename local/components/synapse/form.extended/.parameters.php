<?
    if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }

    $site     = ($_REQUEST["site"] <> '' ? $_REQUEST["site"] : ($_REQUEST["src_site"] <>
                                                                '' ? $_REQUEST["src_site"] : false));
    $arFilter = Array("TYPE_ID" => "FEEDBACK_FORM", "ACTIVE" => "Y");
    if ($site !== false) {
        $arFilter["LID"] = $site;
    }

    $arEvent = Array();
    $dbType  = CEventMessage::GetList($by = "ID", $order = "DESC", $arFilter);
    while ($arType = $dbType->GetNext()) {
        $arEvent[$arType["ID"]] = "[" . $arType["ID"] . "] " . $arType["SUBJECT"];
    }

    $arComponentParameters = array(
        "PARAMETERS" => array(
            "USE_CAPTCHA"                  => Array(
                "NAME"    => GetMessage("MFP_CAPTCHA"),
                "TYPE"    => "CHECKBOX",
                "DEFAULT" => "N",
                "PARENT"  => "BASE",
            ),
            "USE_G_RECAPTCHA"              => Array(
                "NAME"    => GetMessage("MFP_G_RECAPTCHA"),
                "TYPE"    => "CHECKBOX",
                "DEFAULT" => "Y",
                "PARENT"  => "BASE",
            ),
            "USE_SUBMIT_FOR_PERSONAL_DATA" => Array(
                "NAME"    => GetMessage("MFP_USE_SUBMIT_FOR_PERSONAL_DATA"),
                "TYPE"    => "CHECKBOX",
                "DEFAULT" => "Y",
                "PARENT"  => "BASE",
            ),
            "OK_TEXT"                      => Array(
                "NAME"    => GetMessage("MFP_OK_MESSAGE"),
                "TYPE"    => "STRING",
                "DEFAULT" => GetMessage("MFP_OK_TEXT"),
                "PARENT"  => "BASE",
            ),
			"PHONE"                      => Array(
                "NAME"    => "Телефон",
                "TYPE"    => "STRING",
                "DEFAULT" => "Телефон",
                "PARENT"  => "BASE",
            ),
            "EMAIL_TO"                     => Array(
                "NAME"    => GetMessage("MFP_EMAIL_TO"),
                "TYPE"    => "STRING",
                "DEFAULT" => htmlspecialcharsbx(COption::GetOptionString("main", "email_from")),
                "PARENT"  => "BASE",
            ),
            "EVENT_NAME"                   => Array(
                "NAME"    => GetMessage("MFP_EVENT_NAME"),
                "TYPE"    => "STRING",
                "DEFAULT" => "FEEDBACK_FORM",
                "PARENT"  => "BASE",
            ),
            "FIELDS"                       => Array(
                "NAME"     => GetMessage("MFP_FIELDS"),
                "TYPE"     => "LIST",
                "MULTIPLE" => "Y",
                "VALUES"   => Array(
                    "NONE"    => GetMessage("MFP_ALL_REQ"),
                    "NAME"    => GetMessage("MFP_NAME"),
                    "EMAIL"   => "E-mail",
					"PHONE"   => "Телефон",
                    "MESSAGE" => GetMessage("MFP_MESSAGE")
                ),
                "DEFAULT"  => "",
                "COLS"     => 25,
                "PARENT"   => "BASE",
            ),

            "REQUIRED_FIELDS" => Array(
                "NAME"     => GetMessage("MFP_REQUIRED_FIELDS"),
                "TYPE"     => "LIST",
                "MULTIPLE" => "Y",
                "VALUES"   => Array(
                    "NONE"    => GetMessage("MFP_ALL_REQ"),
                    "NAME"    => GetMessage("MFP_NAME"),
                    "EMAIL"   => "E-mail",
					"PHONE"   => "Телефон",
                    "MESSAGE" => GetMessage("MFP_MESSAGE")
                ),
                "DEFAULT"  => "",
                "COLS"     => 25,
                "PARENT"   => "BASE",
            ),

            "SEND_FIELDS"      => Array(
                "NAME"     => GetMessage("MFP_SEND_FIELDS"),
                "TYPE"     => "LIST",
                "MULTIPLE" => "Y",
                "VALUES"   => Array(
                    "NONE"    => GetMessage("MFP_ALL_REQ"),
                    "NAME"    => GetMessage("MFP_NAME"),
                    "EMAIL"   => "E-mail",
					"PHONE"   => "Телефон",
                    "MESSAGE" => GetMessage("MFP_MESSAGE")
                ),
                "DEFAULT"  => "",
                "COLS"     => 25,
                "PARENT"   => "BASE",
            ),
            "EVENT_MESSAGE_ID" => Array(
                "NAME"     => GetMessage("MFP_EMAIL_TEMPLATES"),
                "TYPE"     => "LIST",
                "VALUES"   => $arEvent,
                "DEFAULT"  => "",
                "MULTIPLE" => "Y",
                "COLS"     => 25,
                "PARENT"   => "BASE",
            ),

        )
    );


?>