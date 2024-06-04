<?php

    namespace BxExtra\Handlers;

    class Event
    {
        public static function OnAfterEventAdd(&$arFields)
        {
            if ($arFields["ID"] > 0) {
                if ($arFields['IBLOCK_ID'] == IBLOCK_ID_EVENT_REGISTRATIONS) {
                    $rs = \CIBlockElement::GetList(array(), array('ID' => $arFields['ID']));
                    if ($el = $rs->GetNextElement()) {
                        $arItem               = $el->GetFields();
                        $arItem['PROPERTIES'] = $el->GetProperties();
                        $rsEvent              = \CIBlockElement::GetList(array(),
                            array('IBLOCK_ID' => IBLOCK_ID_EVENTS, 'ID' => $arItem['PROPERTIES']['EVENT']['VALUE']));
                        if ($arEvent = $rsEvent->GetNext()) {
                            $arEventFields = array(
                                'EVENT_NAME' => $arEvent['NAME'],
                                'EVENT_ID'   => $arEvent['ID'],
                                'FIRST_NAME' => $arItem['PROPERTIES']['FIRST_NAME']['VALUE'],
                                'LAST_NAME'  => $arItem['PROPERTIES']['LAST_NAME']['VALUE'],
                                'EMAIL'      => $arItem['PROPERTIES']['EMAIL']['VALUE'],
                                'COUNTRY'    => $arItem['PROPERTIES']['COUNTRY']['VALUE'],
                                'SPECIAL'    => $arItem['PROPERTIES']['SPECIAL']['VALUE'],
                                'LEVEL'      => $arItem['PROPERTIES']['LEVEL']['VALUE'],
                                'YEAR'       => $arItem['PROPERTIES']['YEAR']['VALUE'],
                                'SCHOOL'     => $arItem['PROPERTIES']['SCHOOL']['VALUE'],
                                'CLASS'      => $arItem['PROPERTIES']['CLASS']['VALUE'],
                            );
                        }
                        \CEvent::Send('EVENT_REGISTER', SITE_ID, $arEventFields);
                    }
                }
            }
        }
    }