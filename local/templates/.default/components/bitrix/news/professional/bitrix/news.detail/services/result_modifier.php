<?php

    if (strpos($arResult['DETAIL_TEXT'], '#FACULTIES#') !== false) {

        //print '<pre>';
        //print_r($arResult['PROPERTIES']);

        if (is_array($arResult['PROPERTIES']['BLOCKS']['VALUE']) && count($arResult['PROPERTIES']['BLOCKS']['VALUE'])) {
            $content = '<div class="links_block-list clearfix">';
            foreach ($arResult['PROPERTIES']['BLOCKS']['VALUE'] as $value) {
                $value['TEXT'] = trim($value['TEXT']);
                if ( ! empty($value['TEXT'])) {
                    $content .= '<div class="links_block"><h3>' . $value['TITLE'] . '</h3>' . $value['TEXT'] . '</div>';
                }
            }
            $content .= '</div>';

            $arResult['DETAIL_TEXT'] = str_replace('#FACULTIES#', $content, $arResult['DETAIL_TEXT']);
        }
    }

    if (is_array($arResult['PROPERTIES']['PHOTOS']['VALUE']) && count($arResult['PROPERTIES']['PHOTOS']['VALUE'])) {
        $arResult['PICTURES_RESIZED'] = array();
        foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $pictureId) {
            $arResult['PICTURES_RESIZED'][] = array(
                'small' => CFile::ResizeImageGet($pictureId, array('height' => 195, 'width' => 288),
                    BX_RESIZE_IMAGE_EXACT, true),
                'big'   => CFile::ResizeImageGet($pictureId, array('height' => 600, 'width' => 600),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
            );
        }
    }

