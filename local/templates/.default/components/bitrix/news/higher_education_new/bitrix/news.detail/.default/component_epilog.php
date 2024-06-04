<?
if ($arResult['ID']) {

    $arElement = CIBlockElement::GetByID($arResult['ID'])->Fetch();

    if ($arElement) {
        $sectionId = $arElement['IBLOCK_SECTION_ID'];

        $arSection = CIBlockSection::GetByID($sectionId)->Fetch();

        if ($arSection) {
            $parentSectionId = $arSection['IBLOCK_SECTION_ID'];

            $arParentSection = CIBlockSection::GetByID($parentSectionId)->Fetch();

            if ($arParentSection) {
                $parentSectionCode = $arParentSection['CODE'];
                $elementCode = $arElement['CODE'];
                $canonicalUrl = '/higher-education/' . $parentSectionCode . '/' . $elementCode . '/';
                $currentPage = $APPLICATION->GetCurPage();
				$APPLICATION->SetPageProperty('canonical', $canonicalUrl);

                if ($currentPage != $canonicalUrl) {


					header("HTTP/1.1 301 Moved Permanently");
					

                    echo "<script>window.location.href = '$canonicalUrl';</script>";
                    die();  
                }
            }
        }
    }
}

?>