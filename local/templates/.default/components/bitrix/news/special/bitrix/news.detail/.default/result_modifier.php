<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$nofollowLinks = [
    'https://iclass-news.ru/consultation',
    'https://studydubai.ru/',
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
?>
