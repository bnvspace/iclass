<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if ( ! empty($arResult)): ?>
    <?
    $sSectionName = "";
    $path         = $APPLICATION->GetCurDir();
    $path         = explode('/', trim($path, '/'));
    $path         = $path[0];
    $sPath        = $_SERVER["DOCUMENT_ROOT"] . '/' . $path . "/.section.php";
    include($sPath);
    $title = $sSectionName;
    ?>
    <!--<? if ( ! empty($title)): ?><?=$title?></h1><? endif ?>-->
<?
$url=$APPLICATION->GetCurDir();
$level=substr_count($url,'/');
if (!$level) {$level=1;}
?>

<? foreach ($arResult as $arItemName): ?>
    <? if ($arItemName["SELECTED"]) { ?>
<?if($level < 4) { ?>
	<h1 class="text-center"><?=$arItemName["TEXT"]?></h1>
<? } else { ?>
	<div class="news_detail_title"><?=$arItemName["TEXT"]?></div>
<? } ?>
    <? } ?>
<? endforeach ?>


    <div class="link_list"><span>
<? foreach ($arResult as $arItem):
    if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
        continue;
    }
    ?>
    <? if ($arItem["SELECTED"]): ?>
    <a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a>
<? else: ?>
    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
<? endif ?>
<? endforeach ?></span></div><? endif ?>