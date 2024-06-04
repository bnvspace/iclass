<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (count($arResult["ITEMS"])): ?>
 
    <div class="link_list-type2" id="innerNav" style="height:82px;">

<? foreach ($arResult["ITEMS"] as $arItem):
				$elementId = $arItem['ID'];  
				
				
				$arElement = CIBlockElement::GetByID($elementId)->Fetch();
				
				if ($arElement) {
					$sectionId = $arElement['IBLOCK_SECTION_ID'];
				}
					$arSection = CIBlockSection::GetByID($sectionId)->Fetch();
				
					if ($arSection) {
						$parentSectionId = $arSection['IBLOCK_SECTION_ID'];
					
					}	
						$arParentSection = CIBlockSection::GetByID($parentSectionId)->Fetch();
						if ($arParentSection) {
							$parentSectionCode = $arParentSection['CODE'];
				
						}
				
				$dir = $APPLICATION->GetCurDir();
				if(strstr($dir, '/higher-education/') && $parentSectionCode ) {
					$newUrl = '/higher-education/'.$parentSectionCode.'/'. $arElement['CODE'].'/';
				} else {
						$newUrl = $arItem['DETAIL_PAGE_URL'];
				}

        ?>

<a href="<?=$newUrl?>"><?=$arItem['NAME']?></a>
    <? endforeach; ?></div>
    <br >
  <? if (count($arResult["ITEMS"]) >= 5): ?> <button class="link_list-type2-btn">Показать полностью</button><?endif;?>
    <br >  <br >
    <? endif ?>