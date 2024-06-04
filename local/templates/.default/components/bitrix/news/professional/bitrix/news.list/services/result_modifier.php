<?php

    $arResult['SECTIONS'] = array();

    $rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'),
        array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'));
    while ($r = $rsSections->GetNext()) {
        $arResult['SECTIONS'][$r['ID']] = $r;
    }

    foreach ($arResult['ITEMS'] as $arItem) {

        if ( ! empty($arItem['PROPERTIES']['SCHOOL']['VALUE'])) {
            if (empty($arResult['SCHOOLS'])) {
                $rs = CIBlockElement::GetList(array(),
                    array('IBLOCK_ID' => $arItem['PROPERTIES']['SCHOOL']['LINK_IBLOCK_ID']), false, false,
                    array('ID', 'NAME', 'DETAIL_PAGE_URL'));
                while ($r = $rs->GetNext()) {
                    $arResult['SCHOOLS'][$r['ID']] = $r;
                }
            }

            $arItem['SCHOOL'] = $arResult['SCHOOLS'][$arItem['PROPERTIES']['SCHOOL']['VALUE']];
        }

        if (isset($arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']])) {
            $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem;
        }

    }
