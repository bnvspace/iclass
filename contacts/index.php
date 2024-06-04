<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "noindex, nofollow");
$APPLICATION->SetPageProperty("description", "Контакты компании «Ай Класс», помогающей в поступлении и обучении за границей. Адрес: г. Санкт-Петербург, Малый проспект П.С., д. 3. Телефон: +7 (812) 244-99-64. Время работы: пн.-пт. 10:00 – 20:00.");
$APPLICATION->SetTitle("Контакты образовательного центра «Ай Класс»");
?><br>
<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	Array(
		"START_FROM" => "1",
		"PATH" => "",
		"SITE_ID" => "-"
	)
);?>
	<h1 class="text-center">Контактная информация</h1>
	<div class="link_list">
 <span><a href="/ajax/contacts/school.php" class="js-ajaxLink" data-target="#contactsMapBlock" rel="nofollow">школа иностранных языков</a>
     <a href="/ajax/contacts/education.php" class="selected js-ajaxLink" data-target="#contactsMapBlock" rel="nofollow">образование за рубежом</a></span>
	</div>
</div>
<div class="map_block" id="contactsMapBlock">
	<div class="map_block-address">
		<div class="container">
			<div itemscope="" itemtype="http://schema.org/Organization">
				<h2>Адрес «<span itemprop="name">Ай Класс</span>»</h2>
				<p>
				</p>
				<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
 <span itemprop="postalCode">197198</span>, <span itemprop="addressLocality">Санкт-Петербург</span>, ул. Льва Толстого д. 9
				</div>
				<p>
				</p>
				<h2>Режим работы</h2>
				<p>
					<time itemprop="openingHours" datetime="Mo-Fr 10:30−19:00">
					понедельник, вторник, среда, четверг, пятница: <b>10:30 - 19:00</b><br>
					 суббота, воскресенье: <b>выходные дни</b> </time>
				</p>
				<h2>телефон</h2>
				<p class="js-ga-hover_phones">
					<b><span itemprop="telephone"><a href="tel:+78122449964">+78122449964</a></b><br>

 <b><a href="tel:+78005508433">+78005508433</a> (звонок бесплатный по всей России) </span></b> </b> <br>
				</p>
			</div>
			<p>
 <br>
			</p>
		</div>
	</div>
	<?/*$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:
{s:10:\"google_lat\";d:59.95393095265694;s:10:\"google_lon\";d:30.290368409192627;s:12:\"google_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:108:\"Санкт-Петербург, ул. Льва Толстого, д. 9\";s:3:\"LON\";d:30.290360748767853;s:3:\"LAT\";d:59.95395336083471;}}}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "463",
		"CONTROLS" => array(),
		"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
		"MAP_ID" => "",
		"COMPONENT_TEMPLATE" => ".default"
	)
);*/?>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5bdbd3ac0ee47986de0c102541d3f7f60181c967434b8d0c11d8b39d8725f34c&amp;width=1280&amp;height=493&amp;lang=ru_RU&amp;scroll=true"></script>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>