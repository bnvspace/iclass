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
$nofollowLinks = [
    'https://studydubai.ru/',
    'https://iclass-news.ru/consultation',
    'https://iclass-news.ru/englishtest',
    'https://www.vk.com/iclass_ukfair',
    'https://www.iclass-study.ru/online-registration.html',
    // Добавьте сюда другие URL, к которым нужно добавить nofollow
];

if (!function_exists('addNofollowToSpecificLinks')) {
    function addNofollowToSpecificLinks($content, $nofollowLinks) {
        if (!is_array($nofollowLinks)) {
            $nofollowLinks = [];
        }

        $processedContent = preg_replace_callback(
            '/<a\s+([^>]*href=["\'](.*?)["\'][^>]*)>/i',
            function ($matches) use ($nofollowLinks) {
                $url = $matches[2];
                if (in_array($url, $nofollowLinks)) {
                    return '<a ' . $matches[1] . ' rel="nofollow">';
                }
                return $matches[0];
            },
            $content
        );

        return $processedContent;
    }
}

// Обработка контента статьи
if (!empty($arResult['DETAIL_TEXT'])) {
    $arResult['DETAIL_TEXT'] = addNofollowToSpecificLinks($arResult['DETAIL_TEXT'], $nofollowLinks);
}
