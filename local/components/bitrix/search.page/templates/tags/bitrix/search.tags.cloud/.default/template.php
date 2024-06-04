<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
    $fw = fopen($_SERVER["DOCUMENT_ROOT"] . "/local/main.log", "a");
    fwrite($fw, "arParams in search.tags.cloud\n");
    fwrite($fw, print_r($arParams, true));
    fwrite($fw, "\n");
    fwrite($fw, "arResult in search.tags.cloud\n");
    fwrite($fw, print_r($arResult, true));
    fwrite($fw, "\n");
    fclose($fw);

    if ($arParams["SHOW_CHAIN"] != "N" && ! empty($arResult["TAGS_CHAIN"])):
        ?>
        <noindex>
            <div class="search-tags-chain" <?=$arParams["WIDTH"]?>><?
                    foreach ($arResult["TAGS_CHAIN"] as $tags):
                        ?><a href="<?=$tags["TAG_PATH"]?>" rel="nofollow"><?=$tags["TAG_NAME"]?></a> <?
                        ?>[<a href="<?=$tags["TAG_WITHOUT"]?>" class="search-tags-link" rel="nofollow">x</a>]  <?
                    endforeach; ?>
            </div>
        </noindex>
        <?
    endif;

    if (is_array($arResult["SEARCH"]) && ! empty($arResult["SEARCH"])):
        ?>
        <noindex>
            <div class="search-tags-cloud" <?=$arParams["WIDTH"]?>><?
                    foreach ($arResult["SEARCH"] as $key => $res) {
                        ?><a href="<?=$res["URL"]?>"
                             style="font-size: <?=$res["FONT_SIZE"]?>px; color: #<?=$res["COLOR"]?>;px"
                             rel="nofollow"><?=$res["NAME"]?></a> <?
                    }
                ?></div>
        </noindex>
        <?
    endif;
?>