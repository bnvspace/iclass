<?
    if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }

    if ( ! in_array((array)$arParams['VIEW_MODE'], (array)$arViewModeList)) {
        $arParams['VIEW_MODE'] = 'LIST';
    }
    if ('N' != $arParams['SHOW_PARENT_NAME']) {
        $arParams['SHOW_PARENT_NAME'] = 'Y';
    }
    if ('Y' != $arParams['HIDE_SECTION_NAME']) {
        $arParams['HIDE_SECTION_NAME'] = 'N';
    }

    $arResult['VIEW_MODE_LIST'] = $arViewModeList;

    if (0 < $arResult['SECTIONS_COUNT']) {
        if ('LIST' != $arParams['VIEW_MODE']) {
            $boolClear     = false;
            $arNewSections = array();
            foreach ($arResult['SECTIONS'] as &$arOneSection) {
                if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL']) {
                    $boolClear = true;
                    continue;
                }
                $arNewSections[] = $arOneSection;
            }
            unset($arOneSection);
            if ($boolClear) {
                $arResult['SECTIONS']       = $arNewSections;
                $arResult['SECTIONS_COUNT'] = count($arNewSections);
            }
            unset($arNewSections);
        }
    }

    if (0 < $arResult['SECTIONS_COUNT']) {
        $boolPicture = false;
        $boolDescr   = false;
        $arSelect    = array('ID');
        $arMap       = array();
        if ('LINE' == $arParams['VIEW_MODE'] || 'TILE' == $arParams['VIEW_MODE']) {
            reset($arResult['SECTIONS']);
            $arCurrent = current($arResult['SECTIONS']);
            if ( ! isset($arCurrent['PICTURE'])) {
                $boolPicture = true;
                $arSelect[]  = 'PICTURE';
            }
            if ('LINE' == $arParams['VIEW_MODE'] && ! array_key_exists('DESCRIPTION', $arCurrent)) {
                $boolDescr  = true;
                $arSelect[] = 'DESCRIPTION';
                $arSelect[] = 'DESCRIPTION_TYPE';
            }
        }
        if ($boolPicture || $boolDescr) {
            foreach ($arResult['SECTIONS'] as $key => $arSection) {
                $arMap[$arSection['ID']] = $key;
            }
            $rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
            while ($arSection = $rsSections->GetNext()) {
                if ( ! isset($arMap[$arSection['ID']])) {
                    continue;
                }
                $key = $arMap[$arSection['ID']];
                if ($boolPicture) {
                    $arSection['PICTURE']                   = intval($arSection['PICTURE']);
                    $arSection['PICTURE']                   = (0 <
                                                               $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
                    $arResult['SECTIONS'][$key]['PICTURE']  = $arSection['PICTURE'];
                    $arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
                }
                if ($boolDescr) {
                    $arResult['SECTIONS'][$key]['DESCRIPTION']       = $arSection['DESCRIPTION'];
                    $arResult['SECTIONS'][$key]['~DESCRIPTION']      = $arSection['~DESCRIPTION'];
                    $arResult['SECTIONS'][$key]['DESCRIPTION_TYPE']  = $arSection['DESCRIPTION_TYPE'];
                    $arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
                }
            }
        }
    }

    $arTmpSections = array();
    foreach ($arResult['SECTIONS'] as &$arSection) {

        if ( ! empty($arSection['PICTURE'])) {
            $arSection['PICTURE_RESIZED'] = CFile::ResizeImageGet($arSection['PICTURE'],
                array('width' => 288, 'height' => 195), BX_RESIZE_IMAGE_EXACT);
        }

        if ($arSection['IBLOCK_SECTION_ID'] == $arResult['SECTION']['ID']) {
            $arTmpSections[$arSection['ID']] = $arSection;
        } else {
            $arTmpSections[$arSection['IBLOCK_SECTION_ID']]['SECTIONS'][] = $arSection;
        }
    }

    $arResult['SECTIONS'] = $arTmpSections;

    $sectionIDs = array();
    foreach ($arResult['SECTIONS'] as $arSection) {
        if ( ! is_array($arSection['SECTIONS']) || empty($arSection['SECTIONS'])) {
            $sectionIDs[] = $arSection['ID'];
        }
    }

    if ( empty($sectionIDs)) {
        $sectionIDs[] = $arResult['SECTION']['ID'];
    }

    $filter = array(
        'IBLOCK_ID'  => $arParams['IBLOCK_ID'],
        'ACTIVE'     => 'Y',
        'SECTION_ID' => $sectionIDs,
    );

    $schoolIDs = array();
    $rs        = CIBlockElement::GetList(array('SORT' => 'ASC'), $filter, false, false, array(
        'ID',
        'NAME',
        'DETAIL_PICTURE',
        'IBLOCK_SECTION_ID',
        'PROPERTY_SCHOOL',
        'PROPERTY_DATES',
        'PROPERTY_AGE',
        'PROPERTY_PRICE',
        'PROPERTY_ACCOMODATION'
    ));
    while ($arItem = $rs->GetNext()) {
        if ( ! empty($arItem['DETAIL_PICTURE'])) {
            $arItem['PICTURE_RESIZED'] = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'],
                array('width' => 168, 'height' => 168), BX_RESIZE_IMAGE_PROPORTIONAL);
        }
        if (isset($arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']])) {
            $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem;
        } else {
            $arResult['ITEMS'][] = $arItem;
        }
        $schoolIDs[] = $arItem['PROPERTY_SCHOOL_VALUE'];
    }

    $rs = CIBlockElement::GetList(array(), array('ID' => $schoolIDs), false, false,
        array('NAME', 'ID', 'DETAIL_PAGE_URL'));
    while ($r = $rs->GetNext()) {
        $arResult['SCHOOLS'][$r['ID']] = $r;
    }
?>