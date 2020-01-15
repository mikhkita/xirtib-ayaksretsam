<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$version = "1"; ?>

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
					<div class="b-cart-item">
						<div class="b-cart-item-img" style="background-image: url(i/cart-1.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Водолазка тонкой вязки</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" data-quantity="100" value="2">
									<input type="hidden" name="item-1-price" value="5200">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
						</div>
						<div class="b-cart-item-price-cont">
							<div class="b-cart-item-price">5 200 руб.</div>
							<div class="b-cart-item-price-discount">7 500 руб.</div>
						</div>
					</div>
					<div class="b-cart-item">
						<div class="b-cart-item-img" style="background-image: url(i/cart-2.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Юбка миди из твита</div>
							<div class="b-cart-item-color">Цвет: бежевый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" data-quantity="100" value="1">
									<input type="hidden" name="item-1-price" value="7980">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
						</div>
						<div class="b-cart-item-price-cont">
							<div class="b-cart-item-price">7 980 руб.</div>
						</div>
					</div>
					<div class="b-cart-item">
						<div class="b-cart-item-img" style="background-image: url(i/cart-3.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Туфли с открытой пяткой</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" data-quantity="100" value="1">
									<input type="hidden" name="item-1-price" value="8790">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
						</div>
						<div class="b-cart-item-price-cont">
							<div class="b-cart-item-price">8 790 руб.</div>
							<div class="b-cart-item-price-discount">9 500 руб.</div>
						</div>
					</div>
					<div class="b-cart-item">
						<div class="b-cart-item-img" style="background-image: url(i/cart-4.jpg);"></div>
						<div class="b-cart-item-info">
							<div class="b-cart-item-name">Сумка кожаная с длинным ремнем</div>
							<div class="b-cart-item-color">Цвет: коричневый</div>
							<div class="b-cart-item-size">Размер: S</div>
							<div class="b-cart-item-count">
								<a href="#" class="b-cart-item-minus icon-minus"></a>
								<div class="b-cart-item-input">
									<input type="text" name="item-1-count" class="input-count" data-quantity="100" value="1">
									<input type="hidden" name="item-1-price" value="10750">
								</div>
								<a href="#" class="b-cart-item-plus icon-plus"></a>
							</div>
						</div>
						<div class="b-cart-item-price-cont">
							<div class="b-cart-item-price">10 750 руб.</div>
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
					<a href="#" class="main-item">Каталог</a>
					<ul>
						<li><a href="#">Новогодняя коллекция</a></li>
						<li><a href="#">Новогодняя коллекция</a></li>
						<li><a href="#">Новогодняя коллекция</a></li>
						<li><a href="#">Новогодняя коллекция</a></li>
						<li><a href="#">Новогодняя коллекция</a></li>
						<li><a href="#">Новогодняя коллекция</a></li>
					</ul>
				</div>
				<div class="b-menu-section">
					<a href="#" class="main-item">Справка</a>
					<ul>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Политика конфиденциальности</a></li>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Политика конфиденциальности</a></li>
					</ul>
				</div>
				<div class="b-menu-section">
					<a href="#" class="main-item">Будьте с нами</a>
					<ul>
						<li><a href="#">Вконтакте</a></li>
						<li><a href="#">Вконтакте</a></li>
						<li><a href="#">Вконтакте</a></li>
					</ul>
				</div>
			</div>
			<div class="b-menu-mobile">
				<ul class="b-menu-mobile-list">
					<li>
						<a href="#">Каталог</a>
						<ul class="b-menu-sub">
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
							<li><a href="#">Новогодняя коллекция</a></li>
						</ul>
						<div class="icon b-arrow-right"></div>
					</li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Условия доставки</a></li>
					<li><a href="#">Условия обмена и возврата</a></li>
					<li><a href="#">Информация об оплате</a></li>
					<li><a href="#">Контакты</a></li>
					<li><a href="#">Политика конфиденциальности</a></li>
				</ul>
				<ul class="b-social">
					<li><a href="//vk.com" class="icon soc-vk">Вконтакте</a></li>
					<li><a href="//facebook.com" class="icon soc-facebook">Facebook</a></li>
					<li><a href="//instagram.com" class="icon soc-instagram">Instagram</a></li>
					<li><a href="//youtube.com" class="icon soc-youtube">Youtube</a></li>
				</ul>
				<div class="b-menu-mobile-list slide-cont"></div>
			</div>
		</div>
		<div class="b-content">