<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
</div>
<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 phone-hide tab-hide">
    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
        "AREA_FILE_SHOW"      => "sect",
        "AREA_FILE_SUFFIX"    => "right_content",
        "AREA_FILE_RECURSIVE" => "Y",
        "EDIT_TEMPLATE"       => ""
    ),
        false
    ); ?>
    <? if ($_REQUEST['top'] == 'Y'): ?>
        <a href="#" class="back_to-list clearfix"><i></i><span>вернуться к списку университетов</span></a>
    <? endif; ?>
</div>
</div>
</section>
<? $APPLICATION->IncludeFile('/include_areas/footer.php', Array(), Array("SHOW_BORDER" => false)); ?>
</div>
<script type="text/javascript" src="/bitrix/media/js/script.js"></script>
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW"      => "sect",
    "AREA_FILE_SUFFIX"    => "counters",
    "AREA_FILE_RECURSIVE" => "Y",
    "EDIT_TEMPLATE"       => ""
),
    false
); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter31715571 = new Ya.Metrika({
                    id: 31715571,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true,
                    trackHash: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/31715571" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-65799704-1', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript">
const button = document.querySelector('.link_list-type2-btn');
const block = document.querySelector('.link_list-type2');

if (button) {
    // Обработчик события клика на кнопку
    button.addEventListener('click', () => {
        // Если блок скрыт, то отображаем его, иначе скрываем
        if (block.style.height === '82px') {
            block.style.height = '100%';
            button.textContent = 'Скрыть';
        } else {
            button.textContent = 'Показать полностью';
            block.style.height = '82px';
        }
    });
}

const buttons = document.querySelector('.link_list-type2-btn');
const blocks = document.querySelector('#liksss');

if (buttons) {
    // Обработчик события клика на кнопку
    buttons.addEventListener('click', () => {
        // Если блок скрыт, то отображаем его, иначе скрываем
        if (blocks.style.height === '82px') {
            blocks.style.height = '100%';
            buttons.textContent = 'Скрыть';
        } else {
            buttons.textContent = 'Показать полностью';
            blocks.style.height = '82px';
        }
    });
}

</script>
<script src="/bitrix/js/ga.js"></script>
</body>
</html>
