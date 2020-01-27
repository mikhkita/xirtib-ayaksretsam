<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>

<?
global $APPLICATION;
$APPLICATION->RestartBuffer();
CModule::IncludeModule("iblock");

$result = array("status" => true);

if(count($arResult["SEARCH"])){
	
	$IDs = array();
	foreach($arResult["SEARCH"] as $arItem){
		$IDs[] = $arItem["ITEM_ID"];
	}

	$arInfo = CCatalogSKU::GetInfoByProductIBlock(1);
	if(count($IDs)){
		$items = array();
		$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y", "ID"=>$IDs);
		$res = CIBlockElement::GetList(array(), $arFilter, false, array(), array());
		while($ob = $res->GetNextElement()){
			$arFields = $ob->GetFields();
			$price = "";
			if (is_array($arInfo)) { 
			    $rsOffers = CIBlockElement::GetList(array(),array('IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'PROPERTY_'.$arInfo['SKU_PROPERTY_ID'] => $arFields["ID"])); 
			    if ($arOffer = $rsOffers->GetNextElement()) { 
			    	$arFieldsOffer = $arOffer->GetFields();
			    	$price = CPrice::GetBasePrice($arFieldsOffer["ID"]);
			    } 
			}
			$items[] = array(
				"url" => $arFields["DETAIL_PAGE_URL"],
				"img" => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
				"img_hover" => CFile::GetPath($arFields["DETAIL_PICTURE"]),
				"name" => $arFields["NAME"],
				"price" => (int)$price["PRICE"]
			);
		}
		$result["items"] = $items;

	}else{
		$result["status"] = false;
		$result["errorMsg"] = "Поиск не дал результата. Попробуйте изменить запрос.";
	}
}else{
	$result["status"] = false;
	$result["errorMsg"] = "Поиск не дал результата. Попробуйте изменить запрос.";
}
echo json_encode($result);
die();
?>