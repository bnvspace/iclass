<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страны");
LocalRedirect('/countries/great-britain/', true, '301 Moved Permanently');
exit;
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>