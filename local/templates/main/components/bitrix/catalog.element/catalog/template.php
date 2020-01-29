<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if ($arResult['ITEMS']):
	?><script>
		var offers = (<?=json_encode($arResult['ITEMS'])?>);
	</script><?
endif;


// $this->setFrameMode(true);
?>

<!-- <div id="detail_component"> -->
<? /*$frame = $this->createFrame("detail_component", false)->begin();*/ ?>

<? 

$arItems = $arResult['ITEMS'];
$arResult = $arResult['CURRENT_ITEM'];
$arColors = getColors(); 
$currentColor = array();

foreach ($arColors as $key => $color) {
	
	if (empty($color['BORDER_CODE'])) {
		$arColors[$key]['BORDER_CODE'] = $color['BORDER_CODE'] = '#FFF';
	}

	if ($color['CODE'] == $arResult['PROPERTIES']["COLOR"]["VALUE"]) {
		$arColors[$key]['CURRENT'] = true;
		$currentColor['NAME'] = $color['NAME'];
		$currentColor['BORDER_CODE'] = $color['BORDER_CODE'];
	}
}

?>


<div class="b-detail">
	<div class="b-block">
		<div class="b-detail-cont">
			<div class="b-detail-left">
				<div class="b-detail-big-img-list mobile-slider">
					<? if ($arResult['PROPERTIES']['PHOTOS']['VALUE']): ?>
						<? foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $photo): ?>
							<div class="b-detail-big-img" data-img="item-<?=$photo?>" id="<?=$photo?>">
								<img src="<?=resizePhoto($photo)?>">
							</div>
						<? endforeach; ?>
					<? endif; ?>
				</div>
			</div>
			<div class="b-detail-right stick">
				<div class="b-detail-small-img-list">
					<div class="b-detail-small-img-hover"></div>
					<div class="b-detail-small-img-list-cont">
						<? if ($arResult['PROPERTIES']['PHOTOS']['VALUE']): ?>
							<? foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $key => $photo): ?>
								<? $activeClass = ($key == 0) ? 'active' : '' ;?>
								<div class="b-detail-small-img <?=$activeClass?>" data-img="item-<?=$photo?>" style="background-image: url('<?=resizePhoto($photo, true)?>');">
									<div class="b-detail-img-block"></div>
								</div>
							<? endforeach; ?>
						<? endif; ?>
					</div>
				</div>
				<form action="#" class="b-detail-info-cont">
					<div class="b-detail-right-top">
						<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
							"COMPONENT_TEMPLATE" => ".defaults",
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "s1",
						),false );?>
						<h1><?$APPLICATION->ShowTitle()?></h1>
					</div>
					<div class="b-detail-price"><?=convertPrice($arResult["OFFERS"][0]['PRICES']['PRICE']['VALUE'])?> руб.</div>
					<div class="b-detail-popup-links">
						<a href="#" class="dashed">Обмеры</a>
						<a href="#" class="dashed">Справочник по размерам</a>
					</div>
					<div class="b-detail-option-cont b-detail-size">
						<div class="b-detail-label">Размер: <span class="option-text"><?=$arResult["OFFERS"][0]['PROPERTIES']['SIZE']['VALUE']?></span></div>
						<div class="b-detail-option-list">
							<div class="b-detail-option-hover"></div>
							<div class="b-detail-option-list-cont">
								<? foreach ($arResult["OFFERS"] as $key => $offer): ?>
									<? $activeClass = ($key == 0) ? 'active' : ''; ?>
									<? $isChecked = ($key == 0) ? 'checked' : ''; ?>
									<div class="b-detail-option <?=$activeClass?>">
										<input id="<?=$offer['PROPERTIES']['SIZE']['VALUE']?>" type="radio" name="size" data-option="<?=$offer['PROPERTIES']['SIZE']['VALUE']?>" <?=$isChecked?>>
										<label for="<?=$offer['PROPERTIES']['SIZE']['VALUE']?>"><?=strtoupper($offer['PROPERTIES']['SIZE']['VALUE']);?></label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
					<div class="b-detail-option-cont b-detail-color">
						<div class="b-detail-label">Цвет: <span class="option-text"><?=$currentColor['NAME']?></span></div>
						<div class="b-detail-option-list">
							<div class="b-detail-option-hover" style="border-color: <?=$currentColor['BORDER_CODE']?>;"></div>
							<div class="b-detail-option-list-cont">
								<? foreach ($arItems as $key => $item): ?>
									<? $activeClass = ($item['COLOR']['CURRENT']) ? 'active' : ''; ?>
									<? $isChecked = ($item['COLOR']['CURRENT']) ? 'checked' : ''; ?>
									<? $tickColor = (!empty($item['COLOR']['IS_LIGHT'])) ? 'black-tick' : ''; ?>
									<div class="b-detail-option <?=$tickColor?> <?=$activeClass?> b-color-option" style="background-color: #<?=$item['COLOR']['CODE']?>;">
										<input id="<?=$item['COLOR']['CODE']?>" type="radio" name="color" data-item="<?=$key?>" data-option="<?=$item['COLOR']['NAME']?>" <?=$isChecked?>>
										<label for="<?=$item['COLOR']['CODE']?>" style="border-color: #<?=$item['COLOR']['BORDER_CODE']?>"></label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
					<div class="b-article">Артикул: <span id="item-article"><?=$arResult['PROPERTIES']['ARTICLE']['VALUE']?></span></div>
					<div class="b-btn-cart-cont">
						<a href="/ajax/?action=ADD2BASKET" data-id="73" class="b-btn b-btn-brown b-btn-cart">Добавить в корзину</a>
						<span class="b-preloader hide"></span>
						<span class="b-cap-text hide">Товар успешно добавлен</span>
					</div>
					<div class="b-detail-info">
						<div class="b-detail-payment">
							<div class="b-detail-payment-text">Принимаем к оплате:</div>
							<div class="b-detail-payment-options"></div>
						</div>
						<div class="b-detail-description">
							<?=$arResult['PREVIEW_TEXT']?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script id="detail-template" type="text/x-handlebars-template">
	<div class="b-detail-cont">
		<div class="b-detail-left">
			<div class="b-detail-big-img-list mobile-slider">
				{{#if PHOTOS}}
					{{#PHOTOS}}
						<div class="b-detail-big-img" data-img="item-{{ID}}" id="{{ID}}">
							<img src="{{BIG_SIZE}}">
						</div>
					{{/PHOTOS}}
				{{/if}}
			</div>
		</div>
		<div class="b-detail-right stick">
			<div class="b-detail-small-img-list">
				<div class="b-detail-small-img-hover"></div>
				<div class="b-detail-small-img-list-cont">
					{{#if PHOTOS}}
						{{#PHOTOS}}
							<div class="b-detail-small-img {{#if @first}}active{{/if}}" data-img="item-{{ID}}" style="background-image: url('{{SMALL_SIZE}}');">
								<div class="b-detail-img-block"></div>
							</div>
						{{/PHOTOS}}
					{{/if}}
				</div>
			</div>
			<form action="#" class="b-detail-info-cont">
				<div class="b-detail-right-top">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
						"COMPONENT_TEMPLATE" => ".defaults",
						"START_FROM" => "0",
						"PATH" => "",
						"SITE_ID" => "s1",
					),false );?>
					<h1>{{NAME}}</h1>
				</div>
				<div class="b-detail-price">{{OFFERS.0.PRICE}} руб.</div>
				<div class="b-detail-popup-links">
					<a href="#" class="dashed">Обмеры</a>
					<a href="#" class="dashed">Справочник по размерам</a>
				</div>
				<div class="b-detail-option-cont b-detail-size">
					<div class="b-detail-label">Размер: <span class="option-text">{{OFFERS.0.SIZE}}</span></div>
					<div class="b-detail-option-list">
						<div class="b-detail-option-hover"></div>
						<div class="b-detail-option-list-cont">
							{{#OFFERS}}
								<div class="b-detail-option {{#if @first}}active{{/if}}">
									<input id="{{SIZE}}" type="radio" name="size" data-option="{{SIZE}}" {{#if @first}}checked{{/if}}>
									<label for="{{SIZE}}">{{SIZE}}</label>
								</div>
							{{/OFFERS}}
						</div>
					</div>
				</div>
				<div class="b-detail-option-cont b-detail-color">
					<div class="b-detail-label">Цвет: {{COLOR.NAME}}</span></div>
					<div class="b-detail-option-list">
						<div class="b-detail-option-hover" style="border-color: <?=$currentColor['BORDER_CODE']?>;"></div>
						<div class="b-detail-option-list-cont">
							<? foreach ($arItems as $key => $item): ?>
								<? $activeClass = ($item['COLOR']['CURRENT']) ? 'active' : ''; ?>
								<? $isChecked = ($item['COLOR']['CURRENT']) ? 'checked' : ''; ?>
								<? $tickColor = (!empty($item['COLOR']['IS_LIGHT'])) ? 'black-tick' : ''; ?>
								<div class="b-detail-option <?=$tickColor?> <?=$activeClass?> b-color-option" style="background-color: #<?=$item['COLOR']['CODE']?>;">
									<input id="<?=$item['COLOR']['CODE']?>" type="radio" name="color" data-item="<?=$key?>" data-option="<?=$item['COLOR']['NAME']?>" <?=$isChecked?>>
									<label for="<?=$item['COLOR']['CODE']?>" style="border-color: #<?=$item['COLOR']['BORDER_CODE']?>"></label>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
				<div class="b-article">Артикул: <span id="item-article">{{ARTICLE}}</span></div>
				<div class="b-btn-cart-cont">
					<a href="/ajax/?action=ADD2BASKET" data-id="73" class="b-btn b-btn-brown b-btn-cart">Добавить в корзину</a>
					<span class="b-preloader hide"></span>
					<span class="b-cap-text hide">Товар успешно добавлен</span>
				</div>
				<div class="b-detail-info">
					<div class="b-detail-payment">
						<div class="b-detail-payment-text">Принимаем к оплате:</div>
						<div class="b-detail-payment-options"></div>
					</div>
					<div class="b-detail-description">
						{{PREVIEW_TEXT}}
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<? $GLOBALS['arrFilter']['ID'] = array(); ?>

<? foreach($arResult['PROPERTIES']['ALL_LOOK']['VALUE'] as $look): ?>
	<? array_push($GLOBALS['arrFilter']['ID'], $look); ?>
<? endforeach; ?>

<? if (!empty($GLOBALS['arrFilter']['ID'])): ?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"slider",
		Array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "MORE_PHOTO",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "Y",
			"AJAX_OPTION_JUMP" => "Y",
			"AJAX_OPTION_STYLE" => "N",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/cart/",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPONENT_TEMPLATE" => ".default",
			"CONVERT_CURRENCY" => "N",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => 'sort',
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => 'ASC',
			"ELEMENT_SORT_ORDER2" => "DESC",
			"FILTER_NAME" => "arrFilter",
			"HIDE_NOT_AVAILABLE" => "Y",
			"IBLOCK_ID" => "1",
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_TYPE_ID" => "catalog",
			"INCLUDE_SUBSECTIONS" => "A",
			"LINE_ELEMENT_COUNT" => "1",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Заказ по телефону",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => array(0=>"COLOR_REF",1=>"SIZES_CLOTHES",),
			"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
			"OFFERS_LIMIT" => "",
			"OFFERS_PROPERTY_CODE" => array(0=>"COLOR_REF",1=>"SIZES_CLOTHES",2=>"SIZES_SHOES",3=>"SUBTITLE",4=>"TITLE"),
			"OFFERS_SORT_FIELD" => 'sort',
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => 'asc',
			"OFFERS_SORT_ORDER2" => "desc",
			"OFFER_ADD_PICT_PROP" => "-",
			"OFFER_TREE_PROPS" => array(0=>"COLOR_REF",1=>"SIZES_SHOES",2=>"SIZES_CLOTHES",),
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "Y",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => 12,
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(0=>"PRICE",),
			"PRICE_VAT_INCLUDE" => "N",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPERTIES" => array(),
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "",
			"PRODUCT_SUBSCRIPTION" => "N",
			"PROPERTY_CODE" => array(0=>"SUBTITLE",1=>"",),
			// "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
			"SECTION_CODE_PATH" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "Y",
			"SHOW_404" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"TEMPLATE_THEME" => "site",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "Y",
			"CUSTOM_TITLE" => "Весь образ",
		),
		false
	);?>
<? endif; ?>

<? if ($recently = getRecently($arResult["ID"])): ?>
	<? $GLOBALS["arrFilterRecently"] = array("ID" => $recently); ?>

	<? $APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"slider",
		Array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "MORE_PHOTO",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "Y",
			"AJAX_OPTION_JUMP" => "Y",
			"AJAX_OPTION_STYLE" => "N",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/cart/",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPONENT_TEMPLATE" => ".default",
			"CONVERT_CURRENCY" => "N",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => 'sort',
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => 'ASC',
			"ELEMENT_SORT_ORDER2" => "DESC",
			"FILTER_NAME" => "arrFilterRecently",
			"HIDE_NOT_AVAILABLE" => "Y",
			"IBLOCK_ID" => "1",
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_TYPE_ID" => "catalog",
			"INCLUDE_SUBSECTIONS" => "A",
			"LINE_ELEMENT_COUNT" => "1",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Заказ по телефону",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => array(0=>"COLOR_REF",1=>"SIZES_CLOTHES",),
			"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
			"OFFERS_LIMIT" => "",
			"OFFERS_PROPERTY_CODE" => array(0=>"COLOR_REF",1=>"SIZES_CLOTHES",2=>"SIZES_SHOES",3=>"SUBTITLE",4=>"TITLE"),
			"OFFERS_SORT_FIELD" => 'sort',
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => 'asc',
			"OFFERS_SORT_ORDER2" => "desc",
			"OFFER_ADD_PICT_PROP" => "-",
			"OFFER_TREE_PROPS" => array(0=>"COLOR_REF",1=>"SIZES_SHOES",2=>"SIZES_CLOTHES",),
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "Y",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => 12,
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(0=>"PRICE",),
			"PRICE_VAT_INCLUDE" => "N",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPERTIES" => array(),
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "",
			"PRODUCT_SUBSCRIPTION" => "N",
			"PROPERTY_CODE" => array(0=>"SUBTITLE",1=>"",),
			// "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
			"SECTION_CODE_PATH" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "Y",
			"SHOW_404" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"TEMPLATE_THEME" => "site",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "Y",
			"CUSTOM_TITLE" => "Вы недавно смотрели",
		),
		false
	);?>
<? endif; ?>

<?/*$frame->end();*/?>
<!-- </div> -->
