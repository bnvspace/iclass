<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$nofollowLinks = [
    'https://studydubai.ru/',
    'https://iclass-news.ru/consultation',
    'https://iclass-news.ru/englishtest',
    'https://www.vk.com/iclass_ukfair',
    'https://www.iclass-study.ru/online-registration.html',
    'https://iclassgroup.timepad.ru/event/1976094/#register',
    'https://iclassgroup.timepad.ru/event/2150132/#register',
    // Добавьте сюда другие URL, к которым нужно добавить nofollow
];

$nofollowSubstrings = [
    'vk.com',
    'instagram.com',
    'zoom.us',
    'studydubai.ru',
    'timepad.ru',
    'google.com',
    // Добавьте сюда другие подстроки, которые нужно искать в URL
];

if (!function_exists('addNofollowToSpecificLinks')) {
    function addNofollowToSpecificLinks($content, $nofollowLinks, $nofollowSubstrings) {
        if (!is_array($nofollowLinks)) {
            $nofollowLinks = [];
        }

        $processedContent = preg_replace_callback(
            '/<a\s+([^>]*href=["\'](.*?)["\'][^>]*)>/i',
            function ($matches) use ($nofollowLinks, $nofollowSubstrings) {
                $url = $matches[2];
                $addNofollow = in_array($url, $nofollowLinks);

                if (!$addNofollow) {
                    foreach ($nofollowSubstrings as $substring) {
                        if (strpos($url, $substring) !== false) {
                            $addNofollow = true;
                            break;
                        }
                    }
                }

                if ($addNofollow) {
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
    $arResult['DETAIL_TEXT'] = addNofollowToSpecificLinks($arResult['DETAIL_TEXT'], $nofollowLinks, $nofollowSubstrings);
}

