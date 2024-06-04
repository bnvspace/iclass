<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
//delayed function must return a string
    if (empty($arResult)) {
        return "";
    }
    $strReturn = '<div class="breadcrumb"><a href="/">Главная</a>';
    $num_items = count($arResult);
    for ($index = 0, $itemSize = $num_items; $index < $itemSize; $index++) {
        $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
        if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
            $strReturn .= '<span></span><a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '">' . $title .
                          '</a>';
        } else {
            $strReturn .= '<span></span><b>' . $title . '</b>';
        }
    }
    $strReturn .= '</div>';
    return $strReturn;