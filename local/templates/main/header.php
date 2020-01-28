<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$version = 2; 
$curPage = $APPLICATION->GetCurPage();
$urlArr = $GLOBALS["urlArr"] = explode("/", $curPage);
$isDetail = $GLOBALS["isDetail"] = ($urlArr[1] == "catalog" && isset($urlArr[4]));

?>

<!DOCTYPE html>
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="keywords" content=''>
	<meta name="description" content=''>

	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
	<meta name="format-detection" content="telephone=no">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/KitAnimate.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/slick.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/layout.css?<?=$version?>" type="text/css">

	<link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=SITE_TEMPLATE_PATH?>/fav/android-icon-192x192.png">
	<!-- <link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/fav/favicon-32x32.png"> -->
	<!-- <link rel="icon" type="image/png" sizes="96x96" href="<?=SITE_TEMPLATE_PATH?>/fav/favicon-96x96.png"> -->
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/fav/favicon-16x16.png"> -->
	<!-- <link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/fav/manifest.json"> -->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/fav/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
	
	<?$APPLICATION->ShowHead();?>
</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div id="cart" class="b-cart">
		<div class="b-cart-inner">
			<div class="b-cart-inner-top">
				<div class="b-cart-header">Ваша корзина</div>
				<a href="#" class="b-cart-close icon-close"></a>
			</div>
			<div class="b-cart-inner-empty hide">
				<p>Ваша корзина пуста.</p>
				<a href="/catalog/" class="dashed">Перейти в каталог</a>
			</div>
			<div class="b-cart-inner-list">
				<form action="#">
					<?
					unset($arItem);
					$arItem["MAX_QUANTITY"] = 5;
					$arItem["QUANTITY"] = 2;
					$arItem["ID"] = 21;
					$arItem["BASE_PRICE"] = 5520;//базовая цена
					$arItem["TOTAL_PRICE"] = 4820;//итоговая цена
					?>
					<div class="b-cart-item" data-id="<?=$arItem["ID"]?>" data-quantity="<?=$arItem["MAX_QUANTITY"]?>" data-price-base="<?=$arItem["BASE_PRICE"]?>" data-price-total="<?=$arItem["TOTAL_PRICE"]?>">
						<div class="b-cart-item-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/cart-1.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Водолазка тонкой вязки</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="price-cont-mobile"></div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" value="<?=$arItem["QUANTITY"]?>" oninput="this.value = this.value.replace(/\D/g, '')">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
							<div class="b-cart-item-select icon-arrow-down">
								<select name="basket-count" class="select-count">
									<option value="">0 шт.</option>
									<? for( $i = 1; $i <= 20; $i++ ): ?>
										<option value="<?=$i?>" <? if($arItem["QUANTITY"] == $i) echo "selected";?>
										<? if($arItem["MAX_QUANTITY"] < $i) echo " disabled"; ?>
										><?=$i?> шт.</option>
									<? endfor; ?>
								</select>
							</div>
						</div>
						<div class="price-cont-desktop">
							<div class="b-cart-item-price-cont">
								<div class="b-cart-item-price"><span class="item-val"><?=convertPrice($arItem["BASE_PRICE"]);?></span> руб.</div>
								<div class="b-cart-item-price-discount"><span class="item-val"><?=convertPrice($arItem["TOTAL_PRICE"]);?></span> руб.</div>
							</div>
						</div>
					</div>
					<?
					unset($arItem);
					$arItem["MAX_QUANTITY"] = 100;
					$arItem["QUANTITY"] = 1;
					$arItem["ID"] = 21;
					$arItem["BASE_PRICE"] = 9500;//базовая цена
					$arItem["TOTAL_PRICE"] = 7800;//итоговая цена
					?>
					<div class="b-cart-item" data-id="<?=$arItem["ID"]?>" data-quantity="<?=$arItem["MAX_QUANTITY"]?>" data-price-base="<?=$arItem["BASE_PRICE"]?>" data-price-total="<?=$arItem["TOTAL_PRICE"]?>">
						<div class="b-cart-item-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/cart-2.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Юбка миди из твита</div>
							<div class="b-cart-item-color">Цвет: бежевый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="price-cont-mobile"></div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" value="<?=$arItem["QUANTITY"]?>" oninput="this.value = this.value.replace(/\D/g, '')">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
							<div class="b-cart-item-select icon-arrow-down">
								<select name="basket-count" class="select-count">
									<option value="">0 шт.</option>
									<? for( $i = 1; $i <= 20; $i++ ): ?>
										<option value="<?=$i?>" <? if($arItem["QUANTITY"] == $i) echo "selected";?>
										<? if($arItem["MAX_QUANTITY"] < $i) echo " disabled"; ?>
										><?=$i?> шт.</option>
									<? endfor; ?>
								</select>
							</div>
						</div>
						<div class="price-cont-desktop">
							<div class="b-cart-item-price-cont">
								<div class="b-cart-item-price"><span class="item-val"><?=convertPrice($arItem["BASE_PRICE"]);?></span> руб.</div>
								<div class="b-cart-item-price-discount"><span class="item-val"><?=convertPrice($arItem["TOTAL_PRICE"]);?></span> руб.</div>
							</div>
						</div>
					</div>
					<?
					unset($arItem);
					$arItem["MAX_QUANTITY"] = 10;
					$arItem["QUANTITY"] = 2;
					$arItem["ID"] = 21;
					$arItem["TOTAL_PRICE"] = 12720;//итоговая цена
					?>
					<div class="b-cart-item" data-id="<?=$arItem["ID"]?>" data-quantity="<?=$arItem["MAX_QUANTITY"]?>" data-price-base="<?=$arItem["BASE_PRICE"]?>" data-price-total="<?=$arItem["TOTAL_PRICE"]?>">
						<div class="b-cart-item-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/cart-3.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Туфли с открытой пяткой</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="price-cont-mobile"></div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" value="<?=$arItem["QUANTITY"]?>" oninput="this.value = this.value.replace(/\D/g, '')">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
							<div class="b-cart-item-select icon-arrow-down">
								<select name="basket-count" class="select-count">
									<option value="">0 шт.</option>
									<? for( $i = 1; $i <= 20; $i++ ): ?>
										<option value="<?=$i?>" <? if($arItem["QUANTITY"] == $i) echo "selected";?>
										<? if($arItem["MAX_QUANTITY"] < $i) echo " disabled"; ?>
										><?=$i?> шт.</option>
									<? endfor; ?>
								</select>
							</div>
						</div>
						<div class="price-cont-desktop">
							<div class="b-cart-item-price-cont">
								<div class="b-cart-item-price"><span class="item-val"><?=convertPrice($arItem["TOTAL_PRICE"]);?></span> руб.</div>
							</div>
						</div>
					</div>
					<?
					unset($arItem);
					$arItem["MAX_QUANTITY"] = 20;
					$arItem["QUANTITY"] = 3;
					$arItem["ID"] = 21;
					$arItem["TOTAL_PRICE"] = 10000;//итоговая цена
					?>
					<div class="b-cart-item" data-id="<?=$arItem["ID"]?>" data-quantity="<?=$arItem["MAX_QUANTITY"]?>" data-price-base="<?=$arItem["BASE_PRICE"]?>" data-price-total="<?=$arItem["TOTAL_PRICE"]?>">
						<div class="b-cart-item-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/cart-4.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Сумка кожаная с длинным ремнем</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="price-cont-mobile"></div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" value="<?=$arItem["QUANTITY"]?>" oninput="this.value = this.value.replace(/\D/g, '')">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
							<div class="b-cart-item-select icon-arrow-down">
								<select name="basket-count" class="select-count">
									<option value="">0 шт.</option>
									<? for( $i = 1; $i <= 20; $i++ ): ?>
										<option value="<?=$i?>" <? if($arItem["QUANTITY"] == $i) echo "selected";?>
										<? if($arItem["MAX_QUANTITY"] < $i) echo " disabled"; ?>
										><?=$i?> шт.</option>
									<? endfor; ?>
								</select>
							</div>
						</div>
						<div class="price-cont-desktop">
							<div class="b-cart-item-price-cont">
								<div class="b-cart-item-price"><span class="item-val"><?=convertPrice($arItem["TOTAL_PRICE"]);?></span> руб.</div>
							</div>
						</div>
					</div>
					<div class="b-cart-sum-cont">Итого: <span class="item-val">32 720</span> руб.</div>
					<a href="#" class="b-btn b-btn-brown">Оформить заказ</a>
				</form>
			</div>
		</div>
	</div>
	<div id="mobile-menu"></div>
	
	<div class="b-panel-page" id="page">
		<div class="b-header">
			<div class="b-block">
				<div class="b-header-cont">
					<div class="b-header-block b-header-block-left">
						<a href="#" class="b-menu-icon icon"></a>
						<a href="/" class="b-logo"></a>
					</div>
					<div class="b-header-block b-header-block-right">
						<a href="#" class="b-search-icon icon"></a>
						<a href="#" class="b-cabinet-icon icon"></a>
						<div class="b-header-cart">
							<a href="#" class="b-cart-icon icon"></a>
							<div class="b-cart-text-cont">
								<div class="b-cart-text-inner">
									<div class="b-cart-count">5</div>
									<div class="b-cart-text"> <span class="b-cart-text-dec">товаров</span> на сумму <span class="item-val">32 500</span> руб.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="b-search">
			<script id="search-result-template" type="text/template7">
				{{#if status}}
					{{#each items}}
					    <a href="{{url}}" class="b-catalog-item">
							<div class="b-catalog-item-img">
								<img src="{{img}}">
								<img src="{{img_hover}}" class="hover">
							</div>
							<div class="b-catalog-item-text">{{name}}</div>
							<div class="b-catalog-item-text">{{#if price}} {{price}} руб. {{/if}}</div>
						</a>
					{{/each}}
				{{else}}
					<h2 class="search-empty">{{errorMsg}}</h2>
				{{/if}}
			</script>
			<div class="b-search-content">
				<form method="GET" action="/send/search.php" class="b-search-form" id="b-search-form">
					<div class="b-input-search">
						<button class="b-search-icon icon"></button>
						<input type="text" name="q" class="input-search" placeholder="Поиск по сайту">
						<div class="b-clear-input icon"></div>
						<div class="b-line"></div>
					</div>
				</form>
				<div class="b-block">
					<div class="b-catalog-cont b-search-result">
						<div class="search-preloader"></div>
						<div class="b-search-result-content">
							<div class="b-catalog-menu">
								<h2 class="search-result-title">Результаты поиска</h2>
							</div>
							<div class="b-search-result-list b-catalog-list">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="b-menu">
			<div class="b-block b-menu-desktop clearfix">
				<div class="b-menu-section">
					<span class="main-item">Каталог</span>
					<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections-menu", Array(
	"VIEW_MODE" => "TEXT",	// Вид списка подразделов
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"IBLOCK_TYPE" => "content",	// Тип инфоблока
		"IBLOCK_ID" => "1",	// Инфоблок
		"SECTION_ID" => "",	// ID раздела
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
		"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
		"SECTION_FIELDS" => "",	// Поля разделов
		"SECTION_USER_FIELDS" => "",	// Свойства разделов
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	),
	false
);?>
				</div>
				<div class="b-menu-section">
					<span class="main-item">Справка</span>
					<?$APPLICATION->IncludeComponent("bitrix:menu", "footer-menu", Array(
	"ROOT_MENU_TYPE" => "reference",	// Тип меню для первого уровня
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	),
	false
);?>
				</div>
				<div class="b-menu-section">
					<span class="main-item">Будьте с нами</span>
					<?=includeArea("social");?>
				</div>
			</div>
			<div class="b-menu-mobile">
				<ul class="b-menu-mobile-list">
					<li>
						<a href="#">Каталог</a>
						<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections-menu", Array(
							"VIEW_MODE" => "TEXT",	// Вид списка подразделов
								"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
								"IBLOCK_TYPE" => "content",	// Тип инфоблока
								"IBLOCK_ID" => "1",	// Инфоблок
								"SECTION_ID" => "",	// ID раздела
								"SECTION_CODE" => "",	// Код раздела
								"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
								"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
								"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
								"SECTION_FIELDS" => "",	// Поля разделов
								"SECTION_USER_FIELDS" => "",	// Свойства разделов
								"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
								"CACHE_TYPE" => "A",	// Тип кеширования
								"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
								"CACHE_NOTES" => "",
								"CACHE_GROUPS" => "Y",	// Учитывать права доступа
								"IS_MOBILE" => "Y"
							),
							false
						);?>
						<div class="icon b-arrow-right"></div>
					</li>
					<?$APPLICATION->IncludeComponent("bitrix:menu", "footer-menu", Array(
							"ROOT_MENU_TYPE" => "reference",	// Тип меню для первого уровня
							"MENU_CACHE_TYPE" => "N",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
								0 => "",
							),
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"NO_WRAP" => "Y"
						),
						false
					);?>
				</ul>
				<?=includeArea("social-icons");?>
				<div class="b-menu-mobile-list slide-cont"></div>
			</div>
		</div>
		<div class="b-content">