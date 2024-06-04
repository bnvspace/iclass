<?php

    $arResult['SECTIONS'] = array();
    $rsSections           = CIBlockSection::GetList(array('SORT' => 'ASC'),
        array('IBLOCK_ID' => $arParams['IBLOCK_ID']));
    while ($r = $rsSections->GetNext()) {
        $r['ITEMS']                     = array();
        $arResult['SECTIONS'][$r['ID']] = $r;
    }

    foreach ($arResult['ITEMS'] as $arItem) {
        $arItem['PICTURE_RESIZED'] = CFile::ResizeImageGet($arItem['~DETAIL_PICTURE'],
            array('width' => 122, 'height' => 120), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

        if (empty($arItem['PROPERTIES']['URL']['VALUE'])) {
            $arItem['PROPERTIES']['URL']['VALUE'] = '#';
        }

        $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem;
    }