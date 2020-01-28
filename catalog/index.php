<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");?>

<div class="b-catalog">
	<div class="b-block">
		<div class="b-catalog-cont">
			<div class="b-catalog-menu">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
					"COMPONENT_TEMPLATE" => ".defaults",
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "s1",
				),false );?>
				<h1><?$APPLICATION->ShowTitle()?></h1>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections", Array(
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
			</div>
			<div class="b-catalog-list">
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"main",
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
						"PROPERTY_CODE" => array(0=>""),
						"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
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
					),
					false
				);?>
			</div>
		</div>
		<? if ($recently = getRecently()): ?>
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
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>