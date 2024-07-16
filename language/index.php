<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "index, follow");
$APPLICATION->SetPageProperty("title", "Языковые программы за рубежом | Образовательный центр «Ай Класс»");
$APPLICATION->SetPageProperty("description", "Языковые программы за рубежом | Образовательный центр «Ай Класс»");
$APPLICATION->SetTitle("Обучение английскому за рубежом");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"language",
	Array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "language",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"",1=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"",1=>"NOT_FOLLOW",2=>"COUNTRY",3=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILE_404" => "/404.php",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "learning",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(0=>"",1=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"",1=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/language/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"","section"=>"#SECTION_CODE_PATH#/","detail"=>"#SECTION_CODE_PATH#/#ELEMENT_CODE#/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "NAME",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N"
	)
);?> 
<?php
if ($_SERVER["REQUEST_URI"] == "/language/")
{echo '
<style>
    .faq-section {
        margin: 20px 0;
    }

    .faq-section input,
    .faq-section p {
        display: none;
    }

    .faq-section label+p {
        display: block;
        color: #999;
        font-size: 0.85em;
        -webkit-transition: all 0.15s ease-out;
        -moz-transition: all 0.15s ease-out;
        -ms-transition: all 0.15s ease-out;
        -o-transition: all 0.15s ease-out;
        transition: all 0.15s ease-out;
        /* Обрезаем текст */
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .faq-section input[type="checkbox"]:checked~p {
        display: block;
        color: #444;
        font-size: 1em;
        /* Восстанавливаем обрезание текст по умолчанию */
        text-overflow: clip;
        white-space: normal;
        overflow: visible;
    }

    .faq-section label {
        font-size: 1.2em;
        cursor: pointer;
        background: #f5f5f5;
        display: block;
        position: relative;
        padding: 7px 10px;
        font-weight: bold;
        border: 1px solid #ddd;
        border-left: 3px solid #888;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        -webkit-transition: all 0.15s ease-out;
        -moz-transition: all 0.15s ease-out;
        -ms-transition: all 0.15s ease-out;
        -o-transition: all 0.15s ease-out;
        transition: all 0.15s ease-out;
    }

    .faq-section label::-moz-selection {
        /* Удаляем выделение текста при переключении */
        background: none;
    }

    .faq-section label::selection {
        background: none;
    }

    .faq-section label:hover {
        background: #f5f5f5;
    }

    .faq-section input[type="checkbox"]:checked~label {
        border-color: #b22017;
        background: #d34346;
        background-image: -webkit-gradient(linear,
        left top,
        left bottom,
        from(#fff),
        to(#d34346));
        background-image: -webkit-linear-gradient(top, #fff, #d34346);
        background-image: -moz-linear-gradient(top, #fff, #d34346);
        background-image: -ms-linear-gradient(top, #fff, #d34346);
        background-image: -o-linear-gradient(top, #fff, #d34346);
        background-image: linear-gradient(to bottom, #fff, #d34346);
        -moz-box-shadow: 0 0 1px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.4);
    }

    .faq-section label::before {
        content: "";
        position: absolute;
        right: 4px;
        top: 50%;
        margin-top: -6px;
        border: 6px solid transparent;
        border-left-color: inherit;
    }

    .faq-section input[type="checkbox"]:checked~label::before {
        border: 6px solid transparent;
        border-top-color: inherit;
        margin-top: -3px;
        right: 10px;
    }

    .program-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    .program-container h1 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .program-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .program-card {
        background-color: #fff;
        border-radius: 8px;
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        overflow: hidden;
        position: relative;
        width: calc(33.333% - 20px);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .program-card:last-child {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .program-card img {
        width: 100%;
        height: auto;
    }

    .program-info {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        text-align: left;
    }

    .program-info span {
        margin: 0 0 5px 0;
        font-size: 14px;
        color: #fff;
    }

    .program-info p {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
    }

    a.program-card:hover {
        box-shadow: 0 4px 6px rgb(0 0 0 / 54%)
    }

    .program-card button {
        padding: 10px 20px;
        border: 1px solid #007bff;
        background-color: #fff;
        color: #007bff;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        border-radius: 100px;
    }

    .program-card button:hover {
        border: 1px solid #fff;
        background-color: #007bff;
        color: #fff;
    }

    .program-card:last-child {
        justify-content: center;
    }

    .program-card:last-child .program-info {
        display: flex;
        flex-direction: column;
        background: none;
        position: unset;
    }

    .program-card:last-child .program-info span {
        color: #000;
        text-align: center;
    }

    .table-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        cursor: grab;
        user-select: none;
        /* Disable text selection */
    }

    .scrolling-table {
        overflow-x: auto;
        overflow-y: hidden;
        /*transform: rotateX(180deg); */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* transform: rotateX(180deg);*/
    }


    /* Flat style scrollbar */
    .scrolling-table::-webkit-scrollbar {
        height: 12px;
    }

    .scrolling-table::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .scrolling-table::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
    }

    .scrolling-table::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    table {
        -webkit-user-select: none;
        /* Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+/Edge */
        user-select: none;
        /* Standard */
    }

    @media (max-width: 1024px) {
        .program-card {
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 768px) {
        .program-card {
            width: calc(100% - 20px);
        }
    }

</style> <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<style>
    .faq-section label,
    .faq-section label:hover{
        cursor: default;
        background: #eee;
    }
    body .faq-section p{
        display: block;
        color: #444;
        font-size: 1em;
        text-overflow: clip;
        white-space: normal;
        overflow: visible;
    }
</style>
<![endif]--> <br>
<br>
<h1 align="center">ЯЗЫКОВЫЕ ПРОГРАММЫ ЗА РУБЕЖОМ</h1>
<p>
    Зачем нужны&nbsp;языковые программы за рубежом? Ведь в наше время доступны занятия по английскому с репетитором, онлайн курсы, самостоятельные занятия с помощью интернет-ресурсов, изучение иностранного языка в школе или университете. И это не исчерпывающий список возможностей для изучения английского или другого иностранного языка. Однако несмотря на все усилия, порой бывает сложно убрать языковой барьер и начать свободно и с комфортом общаться на иностранном языке.
</p>
<p>
    Изучение английского языка в стране, где на нем говорят – это мощная концентрация преимуществ всех возможных вариантов повышения языкового уровня, дополненная погружением в языковую среду.
</p>
<h2 align="center">В ЧЕМ ЖЕ ПЛЮСЫ ЯЗЫКОВЫХ КУРСОВ ЗА ГРАНИЦЕЙ?</h2>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Обучение английскому языку проводят квалифицированные преподаватели-носители языка. Таким образом, с вами работают не только специалисты, имеющие нужную педагогическую квалификацию, но и люди, которые способны различить тончайшие нюансы в общении на изучаемом вами языке, сделать вашу речь естественной и соответствующей той или иной ситуации, поскольку для них этот язык родной.
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Обучение проходит в интернациональных группах, а это значит, что единственный общий язык – тот, который вы изучаете. Сознание этого стимулирует коммуникацию&nbsp;и развитие языка, ведь каждый хочет, чтобы его мысль в процессе обсуждения услышали и поняли. Регулярная практика даже вне уроков быстро повысит навыки владения разговорного английского или другого выбранного языка.
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Прохождение&nbsp;языкового курса за рубежом&nbsp;– это прекрасный языковой тренинг для будущей работы или учебы. Вы слышите и пытаетесь понять речь людей из разных стран с их акцентами и особенностями, а не только правильную речь преподавателя. В процессе общения с одногруппниками, вы привыкаете к разным вариантам звучания иностранного языка, что очень поможет в коммуникации с партнерами или клиентами из разных стран в будущем.
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Любая&nbsp;языковая программа за рубежом&nbsp;– это отличный психологический тренинг перед получением высшего образования в иностранном вузе. Особенно это важно для детей, чьи родители планируют их дальнейшее обучение в зарубежной школе или университете. Проходя летние программы, продолжительностью всего 2-3 недели, ребенок, начнет понимать, зачем ему нужен иностранный язык, видит другую модель обучения, учится общаться с людьми других культур, становится самостоятельнее.
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Поездка на языковые курсы – это еще и возможность познакомиться и найти новых друзей из различных стран мира, с которыми можно будет продолжить общаться и после окончания обучения.
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Большинство языковых школ разработало и активно использует свои собственные онлайн ресурсы – задания по разным темам, тесты, дополнительные материалы для чтения и аудирования и многое другое. Причем, студенты языковой школы могут начать ими пользоваться еще до поездки, и иметь доступ к ним еще несколько месяцев после окончания обучения на языковом курсе.
</p>
<p>
    Идеальный способ выучить английский язык – это комбинировать разные варианты его изучения, подбирая то, что наиболее эффективно именно для вас, создавая свой собственный план обучения. Неотъемлемым компонентом такого плана должны быть поездки в страну изучаемого национального языка. Именно они и только они могут дать вам полноценное представление и ощущение того, что иностранный язык – не скучный предмет в школе, и не вынужденная необходимость для получения хороших оценок или престижной работы. Это ваш мощный инструмент саморазвития и интеллектуального роста.
</p>
<p>
    А стоит ли проходить языковые курсы за границей? Конечно да, если вы хотите:
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отправиться в путешествие в ЮАР, Малайзию, ОАЭ, Южную Корею, Сингапур или другую страну для отдыха, где роль английского очень высока;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; жить и работать за границей, реализовывать любые другие цели без опасения быть непонятым в другой стране;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; подготовиться к поступлению в зарубежный колледж или ВУЗ, международным экзаменам IELTS, TOEFL или любым другим;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; улучшить навыки преподавания английского или любого другого языка;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; изучить деловой французский, китайский, немецкий, испанский, английский и любой другой язык для ведения бизнеса;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; получить бесценный опыт, который поможет в достижении поставленных целей;
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; вернуться из-за рубежа с багажом ценных знаний и массой новых впечатлений.
</p>
<p>
    У вас есть возможность выбрать подходящий город, где доступны курсы английского или любого другого языка. Интересными для изучения английского считаются Лондон и Нью-Йорк. Но подойдет и любая другая бывшая британская колония. Курсы в странах Европы стоит проходить обязательно, если целью не является изучение английского языка, а в приоритете стоит другой европейский язык.
</p>
<p>
    Чтобы выбрать подходящую программу обучения английскому языку, нужно разобраться с их видами. В основном, их разделяют по:
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; интенсивности – курс может быть стандартный (до 22 часов еженедельно), интенсивный (до 35 часов еженедельно) и суперинтенсивный (40 и более академических часов);
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; количеству учеников – групповые (до 15 человек), мини-группы (до 7 человек), парные (два человека) и частные (индивидуально);
</p>
<p>
    ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; продолжительности – курсы бывают длительностью 1-40 недель. Интенсивы длятся 7 дней, лучшие результаты дают более продолжительные занятия (от 1/2 месяца и более).
</p>
<p>
    Многие говорят: «Хочу учиться в Англии!». И да, здесь, в колыбели английского языка получится быстро поднять уровень. Но на английском разговаривают и во многих других странах, где он – неотъемлемая часть культуры. Средний срок обучения по программам языковой подготовки в той же Канаде аналогичен Британии и может составлять 7-14 дней. Но стоимость канадских программ по английскому языку ниже, чем в Англии или Ирландии. При этом канадский английский нейтрален и применим и к США, и к Великобритании.
</p>
<p>
    Выбирая место учебы, стоит уделить внимание масштабу учебной организации. Крупные сетевые школы используют единые стандарты и методики, им можно доверять и в оформлении сертификатов. Ведь у каждого филиала есть лицензия. А вот небольшие школы придется проверять по отзывам студентов – сегодня есть множество организаций за рубежом, которые работают без необходимых лицензий. Конечно, знания языка можно получить и в них, но следует быть осторожным, если также требуется действительный сертификат. Без подготовки вы вряд ли сможете проверить информацию о школе. Лучше довериться специалистам.
</p>
<h2>Для детей</h2>
<div class="table-container" id="table-container">
    <div class="scrolling-table">
        <table class="dataframe dataframe">
            <thead>
            <tr style="text-align: right;">
                <th>
                    Страна
                </th>
                <th>
                    Школы
                </th>
                <th>
                    Варианты программы
                </th>
                <th>
                    Длительность
                </th>
                <th>
                    Стоимость обучения
                </th>
                <th>
                    Стоимость проживания
                </th>
                <th>
                    Возраст
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td rowspan="8">
                    Великобритания
                </td>
                <td>
                    Stafford House School of English
                </td>
                <td>
                    General English
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    £1 274 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    11-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    King Edwards School
                </td>
                <td>
                    Bucksmore English, English+Coding
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    £1 990 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    10-16 лет
                </td>
            </tr>
            <tr>
                <td>
                    Guildhoouse School
                </td>
                <td>
                    Guildhoouse School
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    £1 358 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    12-17 лет
                </td>
            </tr>
            <tr>
                <td>
                    Oakham School
                </td>
                <td>
                    Classic Course
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    £1 358 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    17-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    Cats College Cambridge
                </td>
                <td>
                    Cats Cambridge
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    £1 287 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    12-17 лет
                </td>
            </tr>
            <tr>
                <td>
                    Bournemouth Collegiate School
                </td>
                <td>
                    Cats Bournemouth Collegiate School
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    £1 287 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    8-17 лет
                </td>
            </tr>
            <tr>
                <td>
                    Plumpton College
                </td>
                <td>
                    Bucksmore English, English+Coding, English+Adventure, English+VeterinaryCare
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    от £1 560 (1 неделя, в зависимости от выбранной программы)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    13-16 лет
                </td>
            </tr>
            <tr>
                <td>
                    D\'Overbroeck\'s and Oxford International College
                </td>
                <td>
                    D\'Overbroeck\'s Oxford (Computer science, Engineering, International Relations and Politics, Medicine), Oxford International College (Architecture, Business and Management, Marketing, Сriminology, Jurisprudence, MM: Blogger, Influencer, Music Production, Engineering, International Relations and Politics, Medicine)
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    от £2 223 (1 неделя, в зависимости от выбранной программы)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    13-16 и 16-18 лет
                </td>
            </tr>
            <tr>
                <td rowspan="5">
                    США
                </td>
                <td>
                    Cats Academy Boston
                </td>
                <td>
                    Textiles and Fashion, Ivy League Preparation, Steam, Coding Camp, Film Making, Illustration and Comics, English language course
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    от $1 957 (1 неделя, в зависимости от выбранной программы)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    12-18 лет (в зависимости от выбранного курса)
                </td>
            </tr>
            <tr>
                <td>
                    University of California
                </td>
                <td>
                    English language course
                </td>
                <td>
                    2 недели
                </td>
                <td>
                    $3 219
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    13-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    Miami Florida
                </td>
                <td>
                    English language course
                </td>
                <td>
                    2 недели
                </td>
                <td>
                    $3 219
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    15-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    Yale University
                </td>
                <td>
                    English language course
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    $2 660 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    12-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    UC Berkeley
                </td>
                <td>
                    English language course
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    $2 660 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    13-17 лет
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    Швейцария
                </td>
                <td>
                    Swiss Education Academy
                </td>
                <td>
                    Foreign language course (English, French, German) + Activity (Aqua Venture, Fit and Fast, Adrenaline Rush, Swiss Culinary Delights, Discover Switcherland)
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    от € 1500 (1 неделя, в зависимости от выбранного вида размещения и программы)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    10-16 лет
                </td>
            </tr>
            <tr>
                <td>
                    Ceran
                </td>
                <td>
                    Foreign language course (English, French)
                </td>
                <td>
                    от 2 недель
                </td>
                <td>
                    € 4 875 (2 недели)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    9-17 лет
                </td>
            </tr>
            <tr>
                <td rowspan="1">
                    Бельгия
                </td>
                <td>
                    Ceran
                </td>
                <td>
                    Foreign language course (English, French, German, Dutch)
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    € 1 690 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    9-17 лет
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    Испания
                </td>
                <td>
                    Spanich School in Barcelona
                </td>
                <td>
                    Foreign language course (English, Spanish)
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    € 1 245 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    10-18 лет
                </td>
            </tr>
            <tr>
                <td>
                    Bayswater summer-UCLAN University
                </td>
                <td>
                    English language course
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    € 1 245 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    10-17 лет
                </td>
            </tr>
            <tr>
                <td rowspan="1">
                    Кипр
                </td>
                <td>
                    Bayswater summer-UCLAN University
                </td>
                <td>
                    English language course
                </td>
                <td>
                    от 1 недели
                </td>
                <td>
                    € 1 245 (1 неделя)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    10-17 лет
                </td>
            </tr>
            <tr>
                <td rowspan="1">
                    Малайзия
                </td>
                <td>
                    Embassy English Camp
                </td>
                <td>
                    English language course + Hard and Soft skills development
                </td>
                <td>
                    3 недели
                </td>
                <td>
                    от $2 388 (3 недели в зависимости от выбранного вида размещения)
                </td>
                <td>
                    включенно в стоимость обучения
                </td>
                <td>
                    9-19 лет
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<h2>
    Программы обучения </h2>
<div class="program-container">
    <h1>Подобрать программу</h1>
    <div class="program-grid">
        <a href="#" class="program-card"> <img alt="Программы для подростков 10-14 лет" src="https://www.iclass.ru/images/england/great-britain-01.jpeg">
            <div class="program-info">
                Программы для
                <p>
                    подростков 10-14 лет
                </p>
            </div>
        </a> <a href="#" class="program-card"> <img alt="Программы для подростков 15-17 лет" src="https://www.iclass.ru/images/england/great-britain-01.jpeg">
            <div class="program-info">
                Программы для
                <p>
                    подростков 15-17 лет
                </p>
            </div>
        </a> <a href="#" class="program-card"> <img alt="Программы для студентов 18-24 лет" src="https://www.iclass.ru/images/england/great-britain-01.jpeg">
            <div class="program-info">
                Программы для
                <p>
                    студентов 18-24 лет
                </p>
            </div>
        </a> <a href="#" class="program-card"> <img alt="Программы для взрослых от 25 лет" src="https://www.iclass.ru/images/england/great-britain-01.jpeg">
            <div class="program-info">
                Программы для
                <p>
                    взрослых от 25 лет
                </p>
            </div>
        </a> <a href="#" class="program-card"> <img alt="Программы для взрослых от 50 лет" src="https://www.iclass.ru/images/england/great-britain-01.jpeg">
            <div class="program-info">
                Программы для
                <p>
                    взрослых от 50 лет
                </p>
            </div>
        </a>
        <div class="program-card">
            <div class="program-info">
                <b>Не уверены?</b> <button>Показать все программы</button>
            </div>
        </div>
    </div>
</div>
<!-- <div class="table-container" style="overflow-x: auto;">
 <table border="1" cellspacing="0" cellpadding="0">
   <tbody>
   <tr>
     <td>
       <p>
          Курсы для детей 10-14 лет
       </p>
     </td>
     <td>
       <p>
          Курсы для подростков 15-17 лет
       </p>
     </td>
     <td>
       <p>
          программы для студентов 18-24 лет
       </p>
     </td>
   </tr>
   <tr>
     <td>
       <p>
          Программы для взрослых
       </p>
     </td>
     <td>
       <p>
          Программы для взрослых старше 50
       </p>
     </td>
     <td>
       <p>
          Узнать больше
       </p>
     </td>
   </tr>
   </tbody>
   </table>
</div> --> <br>
<br>
<p>
    Нашим менеджерам поступает множество вопросов о курсах за рубежом. Мы собрали наиболее популярные из них и подготовили ответы. А если вы не нашли ответа на свой вопрос – позвоните нам или оставьте заявку на консультацию в форме на сайте.
</p>
<section class="faq-section"> <input type="checkbox" id="q1"> <label for="q1">Какие документы необходимо брать для обучения за границей?</label>
    <p>
        Помимо действительного загранпаспорта и визы потребуется страховка, водительское удостоверение уровня international (если планируете ездить на автомобиле), а также бумаги, перечень которых определяется законодательством страны, уставом школы и некоторыми другими аспектами. Полный перечень укажет менеджер во время консультации. Свяжитесь с нами онлайн или по телефону.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q2"> <label for="q2">Как выбирать место проживания?</label>
    <p>
        Можно выбрать принимающую семью или резиденцию. При проживании в семье придется адаптироваться к распорядку жизни, однако ежедневная практика позволит значительно повысить уровень разговорного языка. Часто принимающая семья устраивает бесплатные экскурсии, особенно если школа расположена в небольшом городке. Проживание в резиденции (хостел или студенческий кампус) дает больше свободы. Можно заниматься языком после уроков – учить грамматику и лексику. А можно в свободное время изучать город, посещать мероприятия и ночные клубы, встречаться с интересными людьми.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q3"> <label for="q3">Что лучше – курсы или лагеря?</label>
    <p>
        Знания можно получать и там, и там. В основном, стоит ориентироваться на возраст. Минимальный для слушателя курсов – 13 лет. А в лагере комфортно даже ученикам начальных классов.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q4"> <label for="q4">
        Можно ли поступить в Оксфорд? </label>
    <p>
        Вы сами выбираете место, где планируете учить английский или другой язык. Например, можно отправиться в Сорбонну для изучения французского, короткие летние программы которой пользуются большой популярностью. Мы всегда готовы предложить самые актуальные варианты в сфере обучения. Определите язык, и бюджет, другие требования, а мы подберем учебные заведения, дадим полезные советы и рекомендации.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q5"> <label for="q5">Какой минимальный уровень английского должен быть для курсов?</label>
    <p>
        Цель программ – научиться владеть языком, поэтому высокие требования не предъявляются. Можно отправиться на обучение с начальным уровнем – есть специальные программы и для Starter/Beginner/Elementary (A1). Пройти тест в удобном формате на знание языка можно заранее.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q6"> <label for="q6">Что делать, если что-то пойдет не так?</label>
    <p>
        Шансы на это минимальны. Мы оказываем полную поддержку клиентов, предоставляем необходимые контакты и, как правило, сами решаем любые возможные проблемы с учебными заведениями, принимающими семьями, владельцами резиденций.
    </p>
</section> <section class="faq-section"> <input type="checkbox" id="q7"> <label for="q7">Есть ли скидки?</label>
    <p>
        Мы предлагаем клиентам самые выгодные условия. Языковые курсы с нами обойдутся в разы дешевле самостоятельного путешествия с целью улучшить английский или другой язык в профильной школе.
    </p>
</section>
<p>
    Наше агентство с удовольствием поможет вам в этом важном деле. Если вы не нашли тот курс, который искали, на нашем сайте или вам нужна дополнительная консультация, свяжитесь с нами по телефону&nbsp;<a href="tel:+7 (800) 550-84-33 ">+7 (800) 550-84-33 </a>&nbsp;&nbsp;или написав на&nbsp;&nbsp;<a href="mailto:info@iclass.ru">info@iclass.ru</a>&nbsp;, и наши компетентные специалисты проконсультируют вас и подберут соответствующие именно вашим целям и задачам программы.
</p>
';}
?>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const tableContainer = document.getElementById('table-container');
        const scrollingTable = tableContainer.querySelector('.scrolling-table');
        let isDown = false;
        let startX;
        let scrollLeft;

        tableContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            tableContainer.classList.add('active');
            startX = e.pageX - tableContainer.offsetLeft;
            scrollLeft = scrollingTable.scrollLeft;
            tableContainer.style.cursor = 'grabbing';
        });

        tableContainer.addEventListener('mouseleave', () => {
            isDown = false;
            tableContainer.classList.remove('active');
            tableContainer.style.cursor = 'grab';
        });

        tableContainer.addEventListener('mouseup', () => {
            isDown = false;
            tableContainer.classList.remove('active');
            tableContainer.style.cursor = 'grab';
        });

        tableContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - tableContainer.offsetLeft;
            const walk = (x - startX) * 3; // scroll-fast
            scrollingTable.scrollLeft = scrollLeft - walk;
        });
    });

</script><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>