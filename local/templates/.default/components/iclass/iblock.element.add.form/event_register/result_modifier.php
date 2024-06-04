<?php

    if ($_REQUEST['ajax'] == 'Y') {
        $APPLICATION->RestartBuffer();
        if (is_array($arResult['ERRORS']) && count($arResult['ERRORS'])) {
            $result = array(
                'result' => 0,
                'errors' => $arResult['ERRORS'],
            );
        } else {
            if ($arResult['ADD'] = 'Y') {
                $result = array(
                    'result' => 1,
                );
            }

        }

        echo json_encode($result);
        exit;
    }

    if ( ! empty($_REQUEST['eventId'])) {
        $filter = array(
            'IBLOCK_ID' => IBLOCK_ID_EVENTS,
            'ID'        => (int)$_REQUEST['eventId'],
        );

        $rs = CIBlockElement::GetList(array(), $filter, false, array('nTopCount' => 1));
        if ($r = $rs->GetNext()) {
            $arResult['EVENT'] = $r;
        }
    }