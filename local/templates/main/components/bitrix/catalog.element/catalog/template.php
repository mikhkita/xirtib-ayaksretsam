<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if ($arResult['JSON_OFFERS']):
	?><script>
		var offers = <?=$arResult['JSON_OFFERS']?>;
	</script><?
endif;

$this->setFrameMode(true);
?>

<div id="detail_component">
<? /*$frame = $this->createFrame("detail_component", false)->begin();*/ ?>

<? $arTmpColors = array(); ?>
<? $arSizes = array(); ?>

<div class="b-detail">
	<div class="b-block">
		<div class="b-detail-left">
			<div class="b-detail-big-img-list">
				<? if ($arResult['PREVIEW_PICTURE']): ?>
					<div class="b-detail-big-img" data-img="item-1" id="1">
						<img src="<?=resizePhoto($arResult['PREVIEW_PICTURE'])?>">
					</div>
				<? endif; ?>
				<? if ($arResult['DETAIL_PICTURE']): ?>
					<div class="b-detail-big-img" data-img="item-2" id="2">
						<img src="<?=resizePhoto($arResult['DETAIL_PICTURE'])?>">
					</div>
				<? endif; ?>
				<? foreach ($arResult["OFFERS"] as $key => $offer): ?>
					<? if (array_search($offer["PROPERTIES"]["COLOR"]['VALUE'], $arTmpColors) === false): ?>
						<? if ($offer['DETAIL_PICTURE']): ?>
							<div class="b-detail-big-img" data-img="item-<?=$offer['ID']?>" id="<?=$offer['ID']?>">
								<img src="<?=resizePhoto($offer['DETAIL_PICTURE'])?>">
							</div>
						<? endif; ?>
						<? array_push($arTmpColors, $offer["PROPERTIES"]["COLOR"]['VALUE']); ?>
					<? endif; ?>
				<? endforeach; ?>
				<? $arTmpColors = array(); ?>
			</div>
		</div>
		<div class="b-detail-right stick">
			<div class="b-detail-small-img-list">
				<div class="b-detail-small-img-hover"></div>
				<div class="b-detail-small-img-list-cont">
					<? $isActive = false; ?>
					<? if ($arResult['PREVIEW_PICTURE']): ?>
						<div class="b-detail-small-img active" data-img="item-1" style="background-image: url('<?=resizePhoto($arResult['PREVIEW_PICTURE'])?>');">
							<div class="b-detail-img-block"></div>
						</div>
						<? $isActive = true; ?>
					<? endif; ?>
					<? if ($arResult['DETAIL_PICTURE']): ?>
						<div class="b-detail-small-img <?if(!$isActive){ echo 'active'; }?>" data-img="item-2" style="background-image: url('<?=resizePhoto($arResult['DETAIL_PICTURE'])?>');">
							<div class="b-detail-img-block"></div>
						</div>
						<?if(!$isActive){ $isActive = true; }?>
					<? endif; ?>
					<? foreach ($arResult["OFFERS"] as $key => $offer): ?>
						<? if (array_search($offer["PROPERTIES"]["SIZE"]['VALUE'], $arSizes) === false): ?>
							<? $arSizes[$offer["PROPERTIES"]["SIZE"]["VALUE_ENUM_ID"]] = $offer["PROPERTIES"]["SIZE"]["VALUE"]; ?>
						<? endif; ?>
						<? if (array_search($offer["PROPERTIES"]["COLOR"]['VALUE'], $arTmpColors) === false): ?> 
							<? if ($offer['DETAIL_PICTURE']): ?>
								<div class="b-detail-small-img <?if(!$isActive){ echo 'active'; }?>" data-img="item-<?=$offer['ID']?>" style="background-image: url('<?=resizePhoto($offer['DETAIL_PICTURE'])?>');">
									<div class="b-detail-img-block"></div>
								</div>
							<? endif; ?>
							<?if(!$isActive){ $isActive = true; }?>
						<? endif; ?>
					<? endforeach; ?>
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
					<? $arSizes = array_values($arSizes); ?>
					<div class="b-detail-label">Размер: <span class="option-text"><?=$arSizes[0]?></span></div>
					<div class="b-detail-option-list">
						<div class="b-detail-option-hover"></div>
						<div class="b-detail-option-list-cont">
							<? foreach ($arSizes as $key => $size): ?>
								<? $activeClass = ($key == 0) ? 'active' : ''; ?>
								<? $isChecked = ($key == 0) ? 'checked' : ''; ?>
								<div class="b-detail-option <?=$activeClass?>">
									<input id="<?=$size?>" type="radio" name="size" data-option="<?=$size?>" <?=$isChecked?>>
									<label for="<?=$size?>"><?=strtoupper($size);?></label>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
				<div class="b-detail-option-cont b-detail-color">
					<div class="b-detail-label">Цвет: <span class="option-text"><?=$arResult['COLORS'][0]['NAME']?></span></div>
					<div class="b-detail-option-list">
						<? $borderColor = (!empty($arResult['COLORS'][0]['IS_LIGHT'])) ? 'rgb(183, 150, 139)' : '#FFF'; ?>
						<div class="b-detail-option-hover" style="border-color: <?=$borderColor?>;"></div>
						<div class="b-detail-option-list-cont">
							<? foreach ($arResult['COLORS'] as $key => $color): ?>
								<? $activeClass = ($key == 0) ? 'active' : ''; ?>
								<? $isChecked = ($key == 0) ? 'checked' : ''; ?>
								<? $border = (!empty($color['BORDER_CODE'])) ? 'border-color: #'.$color["BORDER_CODE"].';':''; ?>
								<? $tickColor = (!empty($color['IS_LIGHT'])) ? 'black-tick' : ''; ?>
								<div class="b-detail-option <?=$tickColor?> <?=$activeClass?> b-color-option" style="background-color: #<?=$color['CODE']?>;">
									<input id="<?=$color['CODE']?>" type="radio" name="color" data-item="item-<?=$arColorToId[$color['CODE']]?>" data-option="<?=$color['NAME']?>" <?=$isChecked?>>
									<label for="<?=$color['CODE']?>" style="<?=$border?>"></label>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
				<div class="b-article">Артикул: <span id="item-article"><?=$arResult['arColorToArticle'][$arResult['COLORS'][0]['CODE']]?></span></div>
				<a href="#" class="b-btn b-btn-brown b-btn-cart">Добавить в корзину</a>
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
</div>
