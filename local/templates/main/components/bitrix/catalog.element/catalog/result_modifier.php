<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// var_dump($arResult["OFFERS"]);
foreach ($arResult["OFFERS"] as $key => $offer) {
	$quantity = intval($offer["PRODUCT"]["QUANTITY"]);
	if( $quantity <= 0 ){
		unset($arResult["OFFERS"][$key]);
	}
}

$arResult["OFFERS"] = array_values($arResult["OFFERS"]);

$arColors = array();
$tmp = array();
$arResult['arColorToId'] = array();
$arResult['arColorToArticle'] = array();

foreach ($arResult["OFFERS"] as $key => $offer){
	if (array_search($offer["PROPERTIES"]["COLOR"]['VALUE'], $arColors) === false){
		array_push($arColors, $offer["PROPERTIES"]["COLOR"]['VALUE']);
		$arResult['arColorToId'][$offer["PROPERTIES"]["COLOR"]['VALUE']] = $offer['ID'];
		$arResult['arColorToArticle'][$offer["PROPERTIES"]["COLOR"]['VALUE']] = $offer["PROPERTIES"]["ARTICLE"]["VALUE"];
	}
}


$allColors = getColors();

foreach($arColors as $key => $color){
	foreach($allColors as $allColorItem){
		if ($color == $allColorItem['CODE']){
			$tmp[$key]['NAME'] = $allColorItem['NAME'];
			$tmp[$key]['CODE'] = $allColorItem['CODE'];
			$tmp[$key]['IS_LIGHT'] = $allColorItem['IS_LIGHT'];
			$tmp[$key]['BORDER_CODE'] = $allColorItem['BORDER_CODE'];
		}
	}
}

$arResult['COLORS'] = array_values($tmp);

if ($arResult["OFFERS"]) {

	$hasColors = false;
	$hasSizes = false;

	foreach ($arResult["OFFERS"] as $key => $offer) {
		if (isset($offer['PROPERTIES']['COLOR']['VALUE'])) {
			$hasColors = true;
		}
		if (isset($offer['PROPERTIES']['SIZE']['VALUE'])) {
			$hasSizes = true;
		}
	}

	foreach ($arResult["OFFERS"] as $key => $offer){ 

		$selected = ($key == 0) ? 'selected' : '';
		$addColor = true;
		$addSize = true;

		if ($hasColors && $hasSizes) {

			$color = $offer['PROPERTIES']['COLOR']['VALUE'];
			$size = $offer['PROPERTIES']['SIZE']['VALUE'];

			$jsonOffers[$color][$size]['NAME'] = $offer['NAME'];
			$jsonOffers[$color][$size]['PRICE'] = $offer['PRICES']['PRICE']['VALUE'];
			$jsonOffers[$color][$size]['DISCOUNT_PRICE'] = $offer['PRICES']['PRICE']['DISCOUNT_VALUE'];
			$jsonOffers[$color][$size]['QUANTITY'] = $offer["PRODUCT"]["QUANTITY"];
			$jsonOffers[$color][$size]['OFFER_ID'] = $offer['ID'];
			$jsonOffers[$color][$size]['ITEM_PRICES'] = $offer["ITEM_PRICES"];
			$jsonOffers[$color][$size]['ARTICLE'] = $offer['PROPERTIES']['ARTICLE']['VALUE'];

		} else {

			$option = ($hasColors) ? $offer['PROPERTIES']['COLOR']['VALUE'] : $offer['PROPERTIES']['SIZE']['VALUE'];

			$jsonOffers[$option]['NAME'] = $offer['NAME'];
			$jsonOffers[$option]['PRICE'] = $offer['PRICES']['PRICE']['VALUE'];
			$jsonOffers[$option]['DISCOUNT_PRICE'] = $offer['PRICES']['PRICE']['DISCOUNT_VALUE'];
			$jsonOffers[$option]['QUANTITY'] = $offer["PRODUCT"]["QUANTITY"];
			$jsonOffers[$option]['OFFER_ID'] = $offer['ID'];
			$jsonOffers[$option]['ITEM_PRICES'] = $offer["ITEM_PRICES"];
			
		}

		// foreach ($tmpColorId as $value){
		// 	if (intval($offer['PROPERTIES']['COLOR']['VALUE']) == intval($value)){
		// 		$addColor = false;
		// 	}
		// }

		// foreach ($tmpSizeId as $value){
		// 	if (intval($offer['PROPERTIES']['SIZE']['VALUE']) == intval($value)){
		// 		$addSize = false;
		// 	}
		// }

		// if ($addColor && isset($offer['PROPERTIES']['COLOR']['VALUE'])){
		// 	$tmpColorId[] = $offer['PROPERTIES']['COLOR']['VALUE'];
		// 	$colorxml = $offer['PROPERTIES']['COLOR']['VALUE'];
		// 	$arResult['COLORS'][$colorxml] = array();
		// 	$arResult['COLORS'][$colorxml]['NAME'] = $offer['PROPERTIES']['COLOR']['VALUE'];
		// 	$arResult['COLORS'][$colorxml]['SELECTED'] = $selected;
		// }

		// if ($addSize && isset($offer['PROPERTIES']['SIZE']['VALUE'])){
		// 	$tmpSizeId[] = $offer['PROPERTIES']['SIZE']['VALUE'];
		// 	$sizexml = $offer['PROPERTIES']['SIZE']['VALUE'];
		// 	$arResult['SIZE'][$sizexml] = array();
		// 	$arResult['SIZE'][$sizexml]['NAME'] = $offer['PROPERTIES']['SIZE']['VALUE'];
		// 	$arResult['SIZE'][$sizexml]['SELECTED'] = $selected;
		// }
	}

	$arResult['JSON_OFFERS'] = json_encode($jsonOffers);
}

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

// $component = $this->getComponent();
// $arParams = $component->applyTemplateModifications();

// $units = array(
// 	2 => "за 1 литр",
// 	3 => "за 1 грамм",
// 	4 => "за 1 килограмм",
// 	5 => "за штуку",
// 	6 => "за упаковку",
// );

// $arResult["MEASURE"] = $units[ $arResult["PRODUCT"]["MEASURE"] ];

// if( isset($GLOBALS["BASKET_ITEMS"][ $arResult["ID"] ]) ){
// 	$arResult["BASKET"] = $GLOBALS["BASKET_ITEMS"][ $arResult["ID"] ];
// }

// $arResult = $arResult + getRating($arResult["ID"]);

// $rsStore = CCatalogStoreProduct::GetList(array(), array('PRODUCT_ID' =>$arResult["ID"], 'STORE_ID' => 1), false, false); 
// $arResult["AMOUNT"] = array();
// if ($arStore = $rsStore->Fetch()){
// 	array_push($arResult["AMOUNT"], $arStore);
// }