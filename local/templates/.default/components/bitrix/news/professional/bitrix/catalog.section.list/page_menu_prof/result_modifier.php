<?php

    foreach ($arResult['SECTIONS'] as $k => $arSection) {
        if ( ! in_array($arSection['ID'], $arParams['FILTER_IDS'])) {
            unset($arResult['SECTIONS'][$k]);
        }
    }