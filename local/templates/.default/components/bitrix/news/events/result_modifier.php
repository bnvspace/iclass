<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$nofollowLinks = [
    'https://studydubai.ru/',
    'https://iclass-news.ru/consultation',
    // Добавьте сюда другие URL, к которым нужно добавить nofollow
];

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

// Предположим, что переменная $arResult['DETAIL_TEXT'] содержит контент статьи
if (!empty($arResult['DETAIL_TEXT'])) {
    $arResult['DETAIL_TEXT'] = addNofollowToSpecificLinks($arResult['DETAIL_TEXT'], $nofollowLinks);
}

