<?php

    namespace BxExtra\Types;

    class Block
    {

//описываем поведение пользовательского свойства
        public static function GetUserTypeDescription()
        {
            return array(
                'PROPERTY_TYPE'        => 'S',
                'USER_TYPE'            => 'block',
                'CLASS_NAME' => __CLASS__,
                'DESCRIPTION'          => 'Блок информации',
                //именно это будет выведено в списке типов свойств во вкладке редактирования свойств ИБ
                //указываем необходимые функции, используемые в создаваемом типе
                'GetPropertyFieldHtml' => array('BxExtra\Types\Block', 'GetPropertyFieldHtml'),
                'ConvertToDB'          => array('BxExtra\Types\Block', 'ConvertToDB'),
                'ConvertFromDB'        => array('BxExtra\Types\Block', 'ConvertFromDB'),
                'GetLength'        => array('BxExtra\Types\Block', 'GetLength'),
                'GetPropertyFieldHtmlMulty'        => array('BxExtra\Types\Block', 'GetPropertyFieldHtmlMulty'),
            );
        }

//формируем пару полей для создаваемого свойства
        public static function GetPropertyFieldHtml($arProperty = [], $value, $strHTMLControlName)
        {
            /*if (empty($value['VALUE']['TEXT'])) {
                return '';
            }*/
            //формируем селект с опциями — квалификациями
            $html = '<div>';
            $name = str_replace('VALUE', '_VALUE', $strHTMLControlName['VALUE']);
            $html .= '<input type="text" name="' . $name . '[TITLE]" value="' . $value['VALUE']['TITLE'] .
                     '" size="70">';

            ob_start();
            ?>
            <table style="width:80%;"><?
                    if ($strHTMLControlName["MODE"] == "FORM_FILL" &&
                        \COption::GetOptionString("iblock", "use_htmledit", "Y") == "Y" &&
                        \CModule::IncludeModule("fileman")
                    ):
                        ?>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="hidden" name="<?=$strHTMLControlName["VALUE"]?>" value="">
                                <?
                                    $text_name = preg_replace("/([^a-z0-9])/is", "_",
                                        $strHTMLControlName["VALUE"] . "[TEXT]");
                                    $text_type = preg_replace("/([^a-z0-9])/is", "_",
                                        $strHTMLControlName["VALUE"] . "[TYPE]");
                                    \CFileMan::AddHTMLEditorFrame($text_name, $value['VALUE']['TEXT'], $text_type,
                                        strToLower($value['VALUE']["TYPE"]), array('width' => 800, 'height' => 250),
                                        "N", 0, "",
                                        "");
                                ?>
                            </td>
                        </tr>
                        <?
                    else:?>
                        <tr>
                            <td><? echo GetMessage("IBLOCK_DESC_TYPE") ?></td>
                            <td>
                                <input type="radio" name="<?=$strHTMLControlName["VALUE"]?>[TYPE]"
                                       id="<?=$strHTMLControlName["VALUE"]?>[TYPE][TEXT]"
                                       value="text" <? if ($ar["TYPE"] !=
                                                           "html"
                                )
                                    echo " checked" ?>>
                                <label for="<?=$strHTMLControlName["VALUE"]?>[TYPE][TEXT]"><? echo GetMessage("IBLOCK_DESC_TYPE_TEXT") ?></label>
                                /
                                <input type="radio" name="<?=$strHTMLControlName["VALUE"]?>[TYPE]"
                                       id="<?=$strHTMLControlName["VALUE"]?>[TYPE][HTML]"
                                       value="html"<? if ($ar["TYPE"] ==
                                                          "html"
                                )
                                    echo " checked" ?>>
                                <label for="<?=$strHTMLControlName["VALUE"]?>[TYPE][HTML]"><? echo GetMessage("IBLOCK_DESC_TYPE_HTML") ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><textarea cols="80" rows="10"
                                                                     name="<?=$strHTMLControlName["VALUE"]?>[TEXT]"
                                                                     style="width:100%"><?=$ar["TEXT"]?></textarea></td>
                        </tr>
                    <? endif; ?>

            </table>
            <?
            $return = ob_get_contents();
            ob_end_clean();

            $html .= $return;

            $html .= '</div>';

            return $html;
            //формируем поле с датой для дескрипшена
        }

        //сохраняем в базу
        public static function ConvertToDB($arProperty, $value)
        {
            $value['VALUE']['TEXT'] = trim($value['VALUE']['TEXT']);
            if (empty($value['VALUE']['TEXT'])) {
                return false;
            }
            $value['VALUE'] = array_merge($value['VALUE'], $value['_VALUE']);
            unset($value['_VALUE']);
            $value['VALUE'] = serialize($value['VALUE']);

            return $value;
        }

        //читаем из базы
        public static function ConvertFromDB($arProperty, $value)
        {
            $value['VALUE'] = unserialize($value['VALUE']);
            //print '<pre>';
            //print_r($value);
            return $value;
        }
        public static function GetLength($arProperty, $value)
        {
            return strlen(trim($value["VALUE"], "\n\r\t "));
        }
        public static function GetPropertyFieldHtmlMulty($arProperty, $value, $strHTMLControlName)
        {
            return $value;
        }
        
    }