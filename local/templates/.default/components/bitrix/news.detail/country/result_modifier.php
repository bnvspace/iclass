<?php

    $arResult['MENU'] = array();
    if (is_array($arResult['PROPERTIES']['SERVICES']['VALUE']) && count($arResult['PROPERTIES']['SERVICES']['VALUE'])) {
        $xmlIDs = $arResult['PROPERTIES']['SERVICES']['VALUE_XML_ID'];
        foreach ($arResult['PROPERTIES']['SERVICES']['VALUE'] as $k => $r) {
            $arResult['MENU'][] = array(
                'NAME'            => $r,
                'DETAIL_PAGE_URL' => '/' . $xmlIDs[$k] . '/' . $arResult['CODE'] . '/',
            );
        }
    }