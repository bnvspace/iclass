<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

    if(CModule::IncludeModule("iblock"))
        {

$IBLOCK_ID = 3;        // указываем из акого инфоблока берем элементы

$arOrder = Array("SORT"=>"ASC");    // сортируем по свойству SORT по возрастанию
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
$arFilter = Array(
    "!ID" => Array(159, 348, 163),
    "IBLOCK_ID"=>$IBLOCK_ID,
    "ACTIVE"=>"Y"
);
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement())
    {
    $arFields = $ob->GetFields();            // берем поля
//        var_dump($arFields['ID']);
//        echo $arFields['NAME']." - arFields['NAME']<br>";
/*        echo '<pre>';
        print_r($arFields);        //
        echo '</pre>';        */

    // начинаем наполнять массив aMenuLinksExt нужными данными
    $aMenuLinksExt[] = Array(
                $arFields['NAME'],
                $arFields['DETAIL_PAGE_URL'],
                Array(),
                Array(),
                ""
                );

    }        //     while($ob = $res->GetNextElement())

        }    //     if(CModule::IncludeModule("iblock"))

/*    echo "<br>Массив <b>aMenuLinksExt</b> - дополнительный";
    echo '<pre>';
    print_r($aMenuLinksExt);
    echo '</pre>';            */


$aMenuLinksExt[] = Array(
    'Турция',
    '/higher-education/turkey/',
    Array(),
    Array(),
    ""
);

 $aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
// $aMenuLinks = array_merge($aMenuLinks);

?>
