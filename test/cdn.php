<?php
exit;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$id = 'bitrixcloud';
$m = new CModule;
    $m->MODULE_ID = $id;
    $m->Remove();
    CAllMain::DelGroupRight($id);

exit;

$sql = 'SELECT * FROM b_bitrixcloud_option';
$sql = 'UPDATE b_bitrixcloud_option SET PARAM_VALUE = 1 WHERE ID IN (15)';

$rs = $DB->Query($sql);

while ($r = $rs->Fetch()) {
    pr($r, true);
}
