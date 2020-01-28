<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$currentItem = $arResult;

if (!empty($arResult['PROPERTIES']['OTHER_COLORS']['VALUE'])) {
	$arResult = findBaseProduct($arResult, array());
}

$arItems = getOtherColorItems($arResult);
$arBaseItem = array(0 => $arResult);
$arResult = array();
$arResult['ITEMS'] = array_merge($arItems, $arBaseItem);

foreach($arResult['ITEMS'] as $key => $arItems){
	$arOffers = CCatalogSKU::getOffersList( $arItems['ID'], 1, array(), array(), array('CODE' => array('SIZE')));
	foreach ($arOffers[$arItems['ID']] as $offerID => $offer) {
		$arProduct = CCatalogProduct::GetByID($offerID);
		$dbPrice = CPrice::GetList(array(),array("PRODUCT_ID" => $offerID, "CATALOG_GROUP_ID" => '1'));
		if ($arPrice = $dbPrice->Fetch()){
			$arOffers[$arItems['ID']][$offerID]['PRICES'] = $arPrice;
		}	
		$arOffers[$arItems['ID']][$offerID]['QUANTITY'] = $arProduct['QUANTITY'];
	}

	$arResult['ITEMS'][$key]['OFFERS'] = $arOffers[$arItems['ID']];
	$arResult['ITEMS'][$key] = getNiceItem($arResult['ITEMS'][$key], $currentItem['ID']);
}

$arResult['CURRENT_ITEM'] = $currentItem;

function getOtherColorItems($arItem, $arOtherItems = array()){
	$arFilter = array(
		'IBLOCK_ID' => 1,
		'ACTIVE' => 'Y',
		'PROPERTY_OTHER_COLORS' => $arItem['ID']
	);

	$arSelect = Array('*');
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arFields['PROPERTIES'] = $ob->GetProperties();
		
		$arOtherItems[] = $arFields;
		$arOtherItems = getOtherColorItems($arFields, $arOtherItems);
	}
	return $arOtherItems;
}

function findBaseProduct($arItem, $baseProduct){
	$arFilter = array(
		'IBLOCK_ID' => 1,
		'ACTIVE' => 'Y',
		'ID' => $arItem['PROPERTIES']['OTHER_COLORS']['VALUE']
	);

	$arSelect = Array('*');
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arFields['PROPERTIES'] = $ob->GetProperties();

		$baseProduct = $arFields;
		
		if(!empty($arFields['PROPERTIES']['OTHER_COLORS']['VALUE'])){
			$baseProduct = findBaseProduct($arFields, $baseProduct);
		}
	}

	return $baseProduct;
}

function getNiceItem($arItem, $currentItemID){

	$arNiceItem = array();
	$arNiceItem['ID'] = intval($arItem['ID']);
	$arNiceItem['NAME'] = $arItem['NAME'];
	$arNiceItem['ARTICLE'] = $arItem['PROPERTIES']['ARTICLE']['VALUE'];
	$arNiceItem['PREVIEW_TEXT'] = $arItem['PREVIEW_TEXT'];
	$arNiceItem['DETAIL_TEXT'] = $arItem['DETAIL_TEXT'];
	$arNiceItem['OFFERS'] = array();
	foreach($arItem['OFFERS'] as $key => $offer){
		$arNiceItem['OFFERS'][] = array(
			'ID' => $offer['ID'],
			'SIZE' => $offer['PROPERTIES']['SIZE']['VALUE'],
			'QUANTITY' => $offer['QUANTITY'],
			'PRICE' => convertPrice($offer['PRICES']['PRICE'])
		);
	}
	$arColors = getColors($arItem['PROPERTIES']['COLOR']['VALUE']);
	$arNiceItem['COLOR'] = $arColors[0];
	if ($currentItemID == $arItem['ID']){
		$arNiceItem['COLOR']['CURRENT'] = true;
	}
	$arNiceItem['PHOTOS'] = array();
	foreach($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $arPhoto){
		$arNiceItem['PHOTOS'][] = array(
			'ID' => $arPhoto,
			'BIG_SIZE' => resizePhoto($arPhoto),
			'SMALL_SIZE' => resizePhoto($arPhoto, true)
		);
	}

	return $arNiceItem;
}