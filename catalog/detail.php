<? 

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мастерская");
?>

<div class="b-detail">
	<div class="b-block">
		<div class="b-detail-left">
			<div class="b-detail-big-img-list mobile-slider">
				<div class="b-detail-big-img" data-img="item-1" id="1">
					<img src="<?=SITE_TEMPLATE_PATH?>/i/item-1.jpg">
				</div>
				<div class="b-detail-big-img" data-img="item-2" id="2">
					<img src="<?=SITE_TEMPLATE_PATH?>/i/item-2.jpg">
				</div>
				<div class="b-detail-big-img" data-img="item-3">
					<img src="<?=SITE_TEMPLATE_PATH?>/i/item-3.jpg">
				</div>
				<div class="b-detail-big-img" data-img="item-4">
					<img src="<?=SITE_TEMPLATE_PATH?>/i/item-4.jpg">
				</div>
				<div class="b-detail-big-img" data-img="item-5">
					<img src="<?=SITE_TEMPLATE_PATH?>/i/item-5.jpg">
				</div>
			</div>
		</div>
		<div class="b-detail-right stick">
			<div class="b-detail-small-img-list">
				<div class="b-detail-small-img-hover"></div>
				<div class="b-detail-small-img-list-cont">
					<div class="b-detail-small-img active" data-img="item-1" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/i/item-1.jpg');">
						<div class="b-detail-img-block"></div>
					</div>
					<div class="b-detail-small-img" data-img="item-2" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/i/item-2.jpg');">
						<div class="b-detail-img-block"></div>
					</div>
					<div class="b-detail-small-img" data-img="item-3" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/i/item-3.jpg');">
						<div class="b-detail-img-block"></div>
					</div>
					<div class="b-detail-small-img" data-img="item-4" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/i/item-4.jpg');">
						<div class="b-detail-img-block"></div>
					</div>
					<div class="b-detail-small-img" data-img="item-5" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/i/item-5.jpg');">
						<div class="b-detail-img-block"></div>
					</div>
				</div>
			</div>
			<div class="b-detail-info-cont">
				<div class="b-detail-right-top">
					<ul class="b-breadcrumbs">
						<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="index.php" title="Главная" itemprop="url"><span itemprop="title">Главная</span></a>
						</li>
						<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="catalog.php" title="Каталог" itemprop="url"><span itemprop="title">Каталог</span></a>
						</li>
						<li><span>Водолазки</span></li>
					</ul>
					<h1>Водолазка тонкой вязки</h1>
				</div>
				<div class="b-detail-price">5 790 руб.</div>
				<div class="b-detail-popup-links">
					<a href="#" class="dashed">Обмеры</a>
					<a href="#" class="dashed">Справочник по размерам</a>
				</div>
				<div class="b-detail-option-cont">
					<div class="b-detail-label">Размер: <span class="option-text">XS</span></div>
					<div class="b-detail-option-list">
						<div class="b-detail-option-hover"></div>
						<div class="b-detail-option-list-cont">
							<div class="b-detail-option active">
								<input id="xs" type="radio" name="size" data-option="XS" checked>
								<label for="xs">XS</label>
							</div>
							<div class="b-detail-option">
								<input id="s" type="radio" name="size" data-option="S">
								<label for="s">S</label>
							</div>
							<div class="b-detail-option">
								<input id="m" type="radio" name="size" data-option="M">
								<label for="m">M</label>
							</div>
							<div class="b-detail-option">
								<input id="xl" type="radio" name="size" data-option="XL">
								<label for="xl">XL</label>
							</div>
						</div>
					</div>
				</div>
				<div class="b-detail-option-cont b-detail-color">
					<div class="b-detail-label">Цвет: <span class="option-text">коричневый</span></div>
					<div class="b-detail-option-list">
						<div class="b-detail-option-hover" style="border-color: #FFF;"></div>
						<div class="b-detail-option-list-cont">
							<div class="b-detail-option" style="background-color: #DDBB98;">
								<input id="light-brown" type="radio" name="color" data-option="светло-коричневый">
								<label for="light-brown"></label>
							</div>
							<div class="b-detail-option active" style="background-color: #B7968B;">
								<input id="brown" type="radio" name="color" checked="" data-option="коричневый">
								<label for="brown"></label>
							</div>
							<div class="b-detail-option black-tick" style="background-color: #FFFFF0;">
								<input id="white" type="radio" name="color" data-option="салатовый">
								<label for="white" style="border-color: #DADAAA"></label>
							</div>
							<div class="b-detail-option" style="background-color: #403D3D;">
								<input id="black" type="radio" name="color" data-option="черный">
								<label for="black"></label>
							</div>
						</div>
					</div>
				</div>
				<div class="b-article">Артикул: 103725</div>
				<a href="#" class="b-btn b-btn-brown">Добавить в корзину</a>
				<div class="b-detail-info">
					<div class="b-detail-payment">
						<div class="b-detail-payment-text">Принимаем к оплате:</div>
						<div class="b-detail-payment-options"></div>
					</div>
					<div class="b-detail-description">
						Пальто двубортное на запахе из альпаки MaxMara с поясом длины миди. Застегивается на потайные кнопки.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b-slider-with-descr-cont">
	<div class="b-block">
		<div class="b-slider-descr">
			<h2>Весь образ</h2>
		</div>
		<div class="b-slider-with-descr">
			<div class="b-slider-with-descr-inner-cont" id="id1">
				<div class="b-slider-with-descr-inner">
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-1.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-6.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Юбка миди из твита</div>
						<div class="b-catalog-item-text">7 980 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-2.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-7.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Туфли с открытой пяткой</div>
						<div class="b-catalog-item-text">8 790 руб.</div>
					</a>
					<a href="#" class="b-catalog-item">
						<div class="b-catalog-item-img">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-3.jpg">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/item-8.jpg" class="hover">
						</div>
						<div class="b-catalog-item-text">Сумка кожаная с длинным ремнем</div>
						<div class="b-catalog-item-text">10 750 руб.</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b-slider-with-descr-cont">
	<div class="b-block">
		<div class="b-slider-descr">
			<h2>Вы недавно смотрели</h2>
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
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>