<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мастерская");
?>

<div class="b-main-slider-cont">
	<div class="b-main-slider">
		<div class="b-main-slider-item">
			<picture>
				<source srcset="<?=SITE_TEMPLATE_PATH?>/i/main-mobile.jpg" media="(max-width: 768px)">
				<img src="<?=SITE_TEMPLATE_PATH?>/i/main.jpg">
			</picture>
		</div>
		<div class="b-main-slider-item">
			<picture>
				<source srcset="<?=SITE_TEMPLATE_PATH?>/i/main-mobile.jpg" media="(max-width: 768px)">
				<img src="<?=SITE_TEMPLATE_PATH?>/i/main.jpg">
			</picture>
		</div>
		<div class="b-main-slider-item">
			<picture>
				<source srcset="<?=SITE_TEMPLATE_PATH?>/i/main-mobile.jpg" media="(max-width: 768px)">
				<img src="<?=SITE_TEMPLATE_PATH?>/i/main.jpg">
			</picture>
		</div>
	</div>
	<div class="b-main-slider-assets">
		<div class="b-main-slider-assets-item">
			<div class="b-assets-bottom">
				<div class="b-assets-item-text">Тёплые истории: встреча с мамой</div>
				<a href="#" class="b-btn">Смотреть LookBook</a>
			</div>
		</div>
		<div class="b-main-slider-assets-item">
			<div class="b-assets-bottom">
				<div class="b-assets-item-text">Тёплые истории</div>
				<a href="#" class="b-btn">Смотреть LookBook</a>
			</div>
		</div>
		<div class="b-main-slider-assets-item">
			<div class="b-assets-bottom">
				<div class="b-assets-item-text">Встреча с мамой</div>
				<a href="#" class="b-btn">Смотреть LookBook</a>
			</div>
		</div>
	</div>
</div>
<div class="b-slider-with-descr-cont">
	<div class="b-block">
		<div class="b-slider-descr">
			<h2>Новое в этом месяце</h2>
			<a href="#" class="b-btn">Смотреть все</a>
		</div>
		<div class="b-slider-with-descr">
			<div class="b-slider-with-descr-inner-cont" id="id1">
				<div class="b-slider-with-descr-inner">
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-1.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-6.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Платье розовое волшебство</div>
						<div class="b-catalog-item-text">16 500 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-2.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-7.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Тёмно-зеленое платье</div>
						<div class="b-catalog-item-text">12 800 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-3.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-8.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Длинное платье с узорами</div>
						<div class="b-catalog-item-text">5 200 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-2.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-9.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Тёмно-зеленое платье</div>
						<div class="b-catalog-item-text">12 800 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-1.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-10.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Платье розовое волшебство</div>
						<div class="b-catalog-item-text">16 500 руб.</div>
					</a>
				</div>
			</div>
		</div>
		<div class="b-slider-with-descr-mobile-btn">
			<a href="#" class="b-btn">Смотреть все</a>
		</div>
	</div>
</div>
<div class="b-lookbook-block">
	<div class="b-block">
		<a href="#" class="b-lookbook-item">
			<div class="b-lookbook-img">
				<img src="<?=SITE_TEMPLATE_PATH?>/i/look-1.jpg">
			</div>
			<div class="b-lookbook-date">14 сентября 2019 г.</div>
			<div class="b-lookbook-text">Lookbook 09/19 Осень в Париже</div>
		</a>
		<a href="#" class="b-lookbook-item">
			<div class="b-lookbook-img">
				<img src="<?=SITE_TEMPLATE_PATH?>/i/look-2.jpg">
			</div>
			<div class="b-lookbook-date">14 сентября 2019 г.</div>
			<div class="b-lookbook-text">Lookbook Men’s Collection</div>
		</a>
	</div>
</div>
<div class="b-slider-with-descr-cont">
	<div class="b-block">
		<div class="b-slider-descr">
			<h2>Скоро в&nbsp;продаже</h2>
			<a href="#" class="b-btn">Смотреть все</a>
		</div>
		<div class="b-slider-with-descr">
			<div class="b-slider-with-descr-inner-cont">
				<div class="b-slider-with-descr-inner">
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-4.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-6.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Легкий весенний топ</div>
						<div class="b-catalog-item-text">5 200 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-5.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-7.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Платье-рубашка голубенькая</div>
						<div class="b-catalog-item-text">7 000 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-6.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-8.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Топ</div>
						<div class="b-catalog-item-text">6 000 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-4.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-9.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Легкий весенний топ</div>
						<div class="b-catalog-item-text">5 200 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-5.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-10.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Платье-рубашка голубенькая</div>
						<div class="b-catalog-item-text">7 000 руб.</div>
					</a>
				</div>
			</div>
		</div>
		<div class="b-slider-with-descr-mobile-btn">
			<a href="#" class="b-btn">Смотреть все</a>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>