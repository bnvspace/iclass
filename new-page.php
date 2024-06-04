<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?
$APPLICATION->IncludeComponent(
	"uplab:tilda", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PROJECT" => "166783",
		"PAGE" => "616999",
		"STOP_CACHE" => "Y",
		"JSDATA" => ""
	),
	false
);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>