<style>
    section.p60{
        padding: 60px 0px;
    }

    .new-base{
        font-family: 'PT Sans', sans-serif;
        font-size: 25px;
        text-transform: uppercase;
        font-weight: 400;
        color: #AF1F17;
        margin: 0px 0px 20px;
    }

    .why-us{
        display: grid;
        grid-template-columns: 1fr 380px;
        grid-gap: 20px;
        align-items: flex-end;
    }

    .why-us img{
        width: 100%;
    }

    .accordion {
        position: relative;
        color: #333333;
        cursor: pointer;
        font-family: 'PT Sans', sans-serif;
        font-weight: bold;
        font-size: 21px;
        padding: 18px 30px 18px 0px;
        width: 100%;
        border: none;
        outline: none;
        transition: 0.4s;
        text-align: left;
        background: transparent;
    }

    .accordion::after{
        content: "";
        width: 20px;
        height: 20px;
        border-radius: 100%;
        display: block;
        position: absolute;
        top: 20px;
        right: 0px;
        background-color: #DDDDDD;
        /*background-image: url("img/faq-arrow.svg");*/
        background-image: url("data:image/svg+xml,%3Csvg width='10' height='7' viewBox='0 0 10 7' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1L5 5L1 1' stroke='white' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E%0A");
        background-repeat: no-repeat;
        background-size: 10px 12px;
        background-position: 5px 6px;
        transition: all 0.2s ease;
    }

    .accordion.active::after{
        background-color: #AF1F17;
        transform: rotate(180deg);
    }

    .panel {
        padding: 0px 0px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        border-bottom: 1px solid #B0B0B0;
    }

    .panel p{
        font-family: 'PT Sans', sans-serif;
        font-weight: 500;
        font-size: 16px;
        padding: 10px 0px;
    }


    .services-sec{
        background: #F7F7F7;
    }

    .services-div{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
    }

    .services-div .item{
        background: #FFFFFF;
        padding: 15px;
        border-left: 2px solid #FFF;
        transition: all 0.2s ease;
    }

    .services-div .item:hover{
        border-left: 2px solid #AF1F17;
    }

    .services-div .title{
        display: grid;
        grid-template-columns: 50px 1fr;
        grid-gap: 10px;
        align-items: flex-end;
        font-family: 'PT Sans', sans-serif;
        font-weight: bold;
        font-size: 21px;
        transition: all 0.2s ease;
    }

    .services-div .item:hover .title{
        color: #AF1F17;
    }

    .services-div .title img{
        width: 100%;
    }

    .services-div .desc{
        font-family: 'PT Sans', sans-serif;
        font-weight: 500;
        font-size: 16px;
        line-height: 150%;
    }

    .services-div .desc a{
        color: #AF1F17 !important;
        text-decoration: underline;
    }

    .services-div li{
        font-family: 'PT Sans', sans-serif;
        font-weight: 500;
        font-size: 16px;
        line-height: 150%;
        list-style-type: disc;
        margin-left: 36px;
    }

    .govno-item{
        grid-row-start: 3;
        grid-row-end: 5;
    }

    .reviews-sec h2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 10px;
    }

    .rev-item{
        border: 3px solid #F2F2F2;
        padding: 15px;
        margin: 0px 10px;
    }

    .rev-header{
        display: grid;
        grid-template-columns: 64px 1fr;
        grid-gap: 10px;
        margin-bottom: 10px;
    }

    .rev-header img {
        max-width: 100%;
        max-height: 100%;
    }

    .name-date{
        font-family: 'PT Sans', sans-serif;
        font-weight: bold;
        font-size: 21px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 6px;
    }

    .name-date span{
        position: relative;
        color: #DEDEDE;
        font-weight: 400;
        font-size: 14px;
        display: flex;
        gap: 5px;
    }

    .name-date span::before{
        content: "";
        width: 16px;
        height: 16px;
        display: block;
        background-image: url("data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16C3.57396 16 0 12.4024 0 8C0 3.57396 3.59763 0 8 0C12.4024 0 16 3.59763 16 8C16 12.4024 12.426 16 8 16ZM8 0.852071C4.07101 0.852071 0.852071 4.04734 0.852071 7.97633C0.852071 11.9053 4.04734 15.1243 8 15.1243C11.9527 15.1243 15.1479 11.929 15.1479 7.97633C15.1479 4.04734 11.929 0.852071 8 0.852071Z' fill='%23DEDEDE'/%3E%3Cpath d='M10.84 11.2426C10.7217 11.2426 10.627 11.1952 10.5323 11.1242L7.69207 8.28398C7.62107 8.21298 7.57373 8.09463 7.57373 7.97629V2.79286C7.57373 2.55617 7.76308 2.36682 7.99977 2.36682C8.23645 2.36682 8.4258 2.55617 8.4258 2.79286V7.81061L11.124 10.5088C11.2897 10.6745 11.2897 10.9585 11.124 11.1242C11.053 11.1952 10.9347 11.2426 10.84 11.2426Z' fill='%23DEDEDE'/%3E%3C/svg%3E%0A");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .rev-item .desc{
        font-family: 'PT Sans', sans-serif;
        font-weight: 500;
        font-size: 16px;
    }

    .rev-header .desc{
        font-size: 14px;
    }

    .link{
        position: relative;
        font-family: 'PT Sans', sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: #333333 !important;
        border:  2px solid #F2F2F2;
        padding: 10px 15px;
        margin: 0px 0px 0px auto;
        display: flex;
        gap: 7px;
        align-items: center;
        width: max-content;
        text-decoration: none;
    }

    .link::after{
        content: "";
        display: block;
        width: 12px;
        height: 12px;
        border-top: 2px solid #AF1F17;
        border-right: 2px solid #AF1F17;
        transform: rotate(45deg);
    }

    .rev-arrows{
        display: flex;
        gap: 10px;
    }

    .rev-arrows a{
        position: relative;
        width: 32px;
        height: 32px;
        display: flex;
        border: 2px solid #EBEBEB;
        justify-content: center;
        align-items: center;
        transition: all 0.2s ease;
    }

    .rev-arrows a:hover{
        border: 2px solid #AF1F17;
    }

    .rev-arrows a:hover::after{
        border-top: 2px solid #AF1F17;
        border-right: 2px solid #AF1F17;
    }

    .rev-arrows a::after{
        content: "";
        display: block;
        width: 14px;
        height: 14px;
        border-top: 2px solid #EBEBEB;
        border-right: 2px solid #EBEBEB;
        transform: rotate(225deg);
        transition: all 0.2s ease;
    }

    .rev-arrows a:last-child::after{
        transform: rotate(45deg);
    }

    .faq-div{
        display: grid;
        grid-template-columns: 380px 1fr;
        grid-gap: 20px;
    }

    .faq-div .right{
        margin-top: -18px;
    }

    .faq-div .left p {
        text-align: left;
    }
    .faq-div .left .link{
        margin: unset;
    }


    .footer-form-div .button{
        border: 0px;
        border-bottom: 3px solid #2B3945;
        background: #455769;
        width: max-content;
        padding: 20px 30px;
        text-align: center;
        color: #FFF;
        font-family: 'PT Sans', sans-serif;
        font-size: 16px;
        font-weight: 700;
        line-height: 130%;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .footer-form-div .button:hover{
        transform: scale(0.97);
    }

    .second-footer-form-sec .footer-form-div * {
        min-height: auto;
    }
    .second-footer-form-sec .right {
        position: relative;
    }
    .second-footer-form-sec .footer-form-women {
        width: 215px;
        float: unset;
        right: unset;
        left: 0;
    }


    @media (max-width:768px){
        .why-us {
            grid-template-columns: 1fr;
        }
        .accordion {
            font-size: 16px;
            padding: 12px 30px 12px 0px;
        }
        .accordion::after {
            top: 11px;
        }
        .panel p {
            font-size: 14px;
        }
        .services-div {
            grid-template-columns: 1fr;
        }
        .services-div .title {
            grid-template-columns: 40px 1fr;
            font-size: 16px;
        }
        .services-div .desc {
            font-size: 14px;
        }
        .services-div li {
            font-size: 14px;
            margin-left: 26px;
        }
        .reviews-sec h2 {
            display: grid;
            justify-content: unset;
            align-items: unset;
            grid-gap: 20px;
            padding: 0px 0px;
        }
        .faq-div {
            grid-template-columns: 1fr;
        }
        .second-footer-form-sec .footer-form-women {
            margin: 40px 0px -80px;
        }
        .faq-div .right {
            margin-top: 0px;
        }
        .rev-item {
            margin: 0px 0px;
        }
        .name-date {
            font-size: 16px;
        }
        .rev-header .desc {
            font-size: 13px;
        }
        .name-date span {
            font-size: 12px;
        }
        .rev-item .desc {
            font-size: 14px;
        }
    }

    .usp {
        padding-top: 0 !important;
        position: relative;
        z-index: 100;
    }

    @media (min-width: 769px) {
        .usp {
            padding-top: 2rem !important;
        }
    }
    @media (max-width: 480px) {
        .table-container {
            overflow-x: auto; /* Добавляем горизонтальную прокрутку */
        }
    }

</style>
<script>
    $(function() {
        $('.accordion').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            let panel = $(this).next();

            console.log(panel.css('max-height'));

            if (parseInt(panel.css('max-height')) !== 0) {
                console.log('rr');
                panel.css('max-height', 0);
            } else {
                console.log('xx');
                panel.css('max-height', panel.get(0).scrollHeight + 'px');
            }
        });

        $('.owl-carousel-reviews').owlCarousel({
            loop:true,
            nav:true,
            items:3,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });

        var owl = $(".owl-carousel-reviews");
        $('.reviews-sec a[href="#next"]').click(function (e) {
            e.preventDefault();
            owl.trigger("owl.next");
        });
        $('.reviews-sec a[href="#prev"]').click(function (e) {
            e.preventDefault();
            owl.trigger("owl.prev");
        });
    });
</script>
<?
//if (isset($_GET['a'])) {
////    $APPLICATION->IncludeFile('/include_areas/services.php', array(), array("SHOW_BORDER" => true));
////    $APPLICATION->IncludeFile('/include_areas/callback.php', array(), array("SHOW_BORDER" => true));
//}
if ($APPLICATION->GetCurPage(false) === '/'):
    $APPLICATION->IncludeFile('/include_areas/usp.php', array(), array("SHOW_BORDER" => true));
    $APPLICATION->IncludeFile('/include_areas/faq.php', array(), array("SHOW_BORDER" => true));
    $APPLICATION->IncludeFile('/include_areas/reviews.php', array(), array("SHOW_BORDER" => true));
endif;
?>
<?

    $APPLICATION->IncludeComponent(
	"synapse:form.extended",
	"iclass-askaquestion",
	array(
		"USE_CAPTCHA" => "N",
		"USE_G_RECAPTCHA" => "Y",
		"USE_SUBMIT_FOR_PERSONAL_DATA" => "Y",
		"OK_TEXT" => "Спасибо! Ваше сообщение отправлено!",
		"SEND_MAIL" => "Y",
		"EVENT_NAME" => "FEEDBACK_FORM",
		"FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "MESSAGE",
		),
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "MESSAGE",
		),
		"SEND_FIELDS" => array(
			0 => "EMAIL",
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "18",
		),
		"COMPONENT_TEMPLATE" => "iclass-askaquestion",
		"EMAIL_TO" => "requests@iclass.ru",
		"PHONE" => "Телефон"
	),
	false
);

?>
<footer class="bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 phone-hide">
                <ul class="footer_menu no-list">
                    <li><b>О компании</b></li>
                    <li><a href="/company/">Ай Класс Образовательный центр</a></li>
                    <li><a href="/company/partners/">Партнеры</a></li>
                    <li><a href="/company/team/">Сотрудники</a></li>
                    <li><a href="/company/certificates/">Сертификаты</a></li>
                    <li><a href="/company/services/">Наши услуги</a></li>
                    <li><a href="/privacy-policy/">Политика обработки персональных данных</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 phone-hide">
                <ul class="no-list footer_menu">
                    <li><b>Образовательные программы</b></li>
                    <li><a href="/language/">Языковые программы</a></li>
                    <li><a href="/secondary-education/">Среднее образование</a></li>
                    <li><a href="/higher-education/">Высшее оразование</a></li>
                    <li><a href="/professional/">Профессиональная подготовка</a></li>
   					<li><a href="/contacts/">Офисы</a></li>
   					<li><a href="/information/responses/">Отзывы</a></li>
   					<li><a href="/sitemap/">Карта сайта</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-xs-15 col-sm-4">
                <form class="search_small" action="/search/">
                    <input type="text" value="" name="q" placeholder="Поиск"><input type="submit" value="">
                </form>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 phone-hide col-xs-4">
                <address
                        class="text-left footer_address"><? $APPLICATION->IncludeFile('/include_areas/contacts_footer.php',
                        Array(), Array("MODE" => "html")); ?></address>
            </div>
        </div>
        <? $APPLICATION->IncludeFile('/include_areas/footer_banners.php') ?>
    </div>
</footer>
<? /*<script>

	$(function() {
		<?if ($APPLICATION->GetCurPage() != '/'):?>
		$('html, body').animate({
	        scrollTop: $("section.content").offset().top
	    }, 500);
	    <?endif?>
	})
</script>*/ ?>
<!-- Begin Verbox {literal} -->
<script>
    (function(){(function c(d,w,m,i) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.id = 'supportScript'; 
        var id = 'a855980f10fa4d080d8b69138924061c';
        s.src = (!i ? 'https://admin.verbox.ru/support/support.js' : 'https://static.site-chat.me/support/support.int.js') + '?h=' + id;
        s.onerror = i ? undefined : function(){c(d,w,m,true)};
        w[m] = w[m] ? w[m] : function(){(w[m].q = w[m].q ? w[m].q : []).push(arguments);};
        (d.head ? d.head : d.body).appendChild(s);
    })(document,window,'Verbox')})();
</script>
<!-- {/literal} End Verbox -->
<script>
	$(document).ready(function(){
		$(".yell-widget").attr('rel', 'nofollow')
	})
</script>
<script>
    // script.js

    function wrapTablesWithContainer() {
        var tables = document.querySelectorAll('table');
        tables.forEach(function(table) {
            // Проверка, есть ли уже контейнер
            if (table.parentElement && table.parentElement.classList.contains('table-container')) {
                return;
            }

            // Создание контейнера
            var container = document.createElement('div');
            container.classList.add('table-container');

            // Оборачивание таблицы контейнером
            table.parentNode.insertBefore(container, table);
            container.appendChild(table);
        });
    }

    function checkViewportWidth() {
        if (window.innerWidth <= 768) { // Здесь можно изменить ширину, при которой срабатывает адаптация
            wrapTablesWithContainer();
        }
    }

    // Проверка при загрузке страницы
    window.addEventListener('load', checkViewportWidth);

    // Проверка при изменении размера окна
    window.addEventListener('resize', checkViewportWidth);


</script>
