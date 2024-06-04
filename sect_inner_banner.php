<?php
$picture = '';
CModule::IncludeModule('iblock');
$rs = CIBlockElement::GetList(array('SORT' => 'ASC'), array('IBLOCK_ID' => 3), false, false, array('ID', 'NAME', 'CODE', 'PROPERTY_BANNERS'));
$path = $APPLICATION->GetCurPage();
$path = explode('/', trim($path, '/'));

while ($r = $rs->Fetch()) {
 if ($r['CODE'] == 'other') {
  $country = $r;
 }
 if (in_array($r['CODE'], $path)) {
  $country = $r;
  break;
 }
}

if (is_array($country['PROPERTY_BANNERS_VALUE']) && count($country['PROPERTY_BANNERS_VALUE'])) {
 $picture = $country['PROPERTY_BANNERS_VALUE'][rand(0, count($country['PROPERTY_BANNERS_VALUE']) - 1) ];
 $picture = CFile::GetPath($picture);
}

if (empty($picture)) {
 $picture = '/bitrix/media/tpl/inner-banner.jpg';
}

// Проверка, является ли текущая страница главной
if ($APPLICATION->GetCurPage(false) === '/') : ?>
  <div class="inner_banner"><img src="<?=$picture?>" alt="<?$APPLICATION->ShowTitle(false)?>" height="250" width="1920"></div>
<?php endif; ?>