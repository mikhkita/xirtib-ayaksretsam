<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$version = 2; 

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

	<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
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
			<div class="b-cart-inner-list">
				<form action="#">
					<?
					$arItem["MAX_QUANTITY"] = 5;
					$arItem["QUANTITY"] = 2;
					?>
					<div class="b-cart-item" data-quantity="<?=$arItem["MAX_QUANTITY"]?>">
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
									<input type="hidden" name="item-1-price" value="5200">
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
								<div class="b-cart-item-price">5 200 руб.</div>
								<div class="b-cart-item-price-discount">7 500 руб.</div>
							</div>
						</div>
					</div>
					<?
					$arItem["MAX_QUANTITY"] = 100;
					$arItem["QUANTITY"] = 1;
					?>
					<div class="b-cart-item" data-quantity="<?=$arItem["MAX_QUANTITY"]?>">
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
									<input type="hidden" name="item-1-price" value="7980">
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
								<div class="b-cart-item-price">7 980 руб.</div>
							</div>
						</div>
					</div>
					<?
					$arItem["MAX_QUANTITY"] = 10;
					$arItem["QUANTITY"] = 2;
					?>
					<div class="b-cart-item" data-quantity="<?=$arItem["MAX_QUANTITY"]?>">
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
									<input type="hidden" name="item-1-price" value="7980">
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
								<div class="b-cart-item-price">7 980 руб.</div>
							</div>
						</div>
					</div>
					<?
					$arItem["MAX_QUANTITY"] = 20;
					$arItem["QUANTITY"] = 3;
					?>
					<div class="b-cart-item" data-quantity="<?=$arItem["MAX_QUANTITY"]?>">
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
									<input type="hidden" name="item-1-price" value="13200">
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
								<div class="b-cart-item-price">13 200 руб.</div>
								<div class="b-cart-item-price-discount">17 900 руб.</div>
							</div>
						</div>
					</div>
					<div class="b-cart-sum-cont">Итого: 32 720 руб.</div>
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
									<div class="b-cart-text"> товаров на сумму 32 500 руб.</div>
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
							<div class="b-catalog-item-text">{{price}} руб.</div>
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