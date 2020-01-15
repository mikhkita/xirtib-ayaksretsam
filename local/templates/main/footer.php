<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	</div>
	<div class="b-footer">
		<div class="b-block">
			<div class="b-footer-top">
				<div class="b-footer-menu-column">
					<a href="/" class="b-footer-logo"></a>
				</div>
				<div class="b-footer-menu-column">
					<h3>Справка</h3>
					<ul>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Условия доставки</a></li>
						<li><a href="#">Условия обмена и возврата</a></li>
						<li><a href="#">Информация об оплате</a></li>
						<li><a href="#">Контакты</a></li>
					</ul>
				</div>
				<div class="b-footer-menu-column">
					<h3>Каталог</h3>
					<ul>
						<li><a href="catalog.php">Вся одежда</a></li>
						<li><a href="#">Распродажа</a></li>
						<li><a href="#">LookBook</a></li>
						<li><a href="#">Resort Collection 2020</a></li>
					</ul>
				</div>
				<div class="b-footer-menu-column">
					<h3>Будьте с нами</h3>
					<ul>
						<li><a href="vk.com">Вконтакте</a></li>
						<li><a href="instagram.com">Instagram</a></li>
						<li><a href="twitter.com">Twitter</a></li>
						<li><a href="facebook.com">Facebook</a></li>
						<li><a href="youtube.com">Youtube</a></li>
					</ul>
				</div>
			</div>
			<div class="b-footer-bottom">
				<div class="b-footer-bottom-item">© 2019 Мастерская. Все права защищены</div>
				<div class="b-footer-bottom-item politics"><a href="/politics">Политика конфиденциальности</a></div>
				<div class="b-footer-bottom-item redder"><a href="http://redder.pro"></a></div>
			</div>
		</div>
	</div>
	<div class="b-menu-overlay" id="b-menu-overlay"></div>
	<div class="b-cart-overlay" id="b-cart-overlay"></div>
</div>
<div style="display:none;">
	<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>
	<div class="b-popup" id="b-popup-1">
		<h3>Оставьте заявку</h3>
		<h4>и наши специалисты<br>свяжутся с Вами в ближайшее время</h4>
		<form action="kitsend.php" data-goal="CALLBACK" method="POST" id="b-form-1">
			<div class="b-popup-form">
				<label for="name">Введите Ваше имя</label>
				<input type="text" id="name" name="name" required/>
				<label for="tel">Введите Ваш номер телефона</label>
				<input type="text" id="tel" name="phone" required/>
				<label for="tel">Введите Ваш E-mail</label>
				<input type="text" id="tel" name="email" required/>
				<input type="hidden" name="subject" value="Заказ"/>
				<input type="submit" style="display:none;">
				<a href="#" class="b-btn b-blue-btn ajax">Заказать</a>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</div>
		</form>
	</div>
	<div class="b-thanks b-popup" id="b-popup-success">
		<h3>Спасибо!</h3>
		<h4>Ваша заявка успешно отправлена.<br/>Наш менеджер свяжется с Вами в течение часа.</h4>
		<input type="submit" class="b-orange-butt" onclick="$.fancybox.close(); return false;" value="Закрыть">
	</div>
	<div class="b-thanks b-popup" id="b-popup-error">
		<h3>Ошибка отправки!</h3>
		<h4>Приносим свои извинения. Пожалуйста, попробуйте отправить Вашу заявку позже.</h4>
		<input type="submit" class="b-orange-butt" onclick="$.fancybox.close(); return false;" value="Закрыть">
	</div>
</div>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&key=AIzaSyD6Sy5r7sWQAelSn-4mu2JtVptFkEQ03YI"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.touch.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitCarousel.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitAnimate.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/slideout.min.js"></script>
<? if( !(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false || strpos($_SERVER['HTTP_USER_AGENT'],'rv:11.0')!==false) ): ?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/imask.min.js"></script>
<? else: ?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js"></script>
<? endif; ?>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/template7.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitSend.js?<?=$version?>"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/main.js?<?=$version?>"></script>
</body>
</html>