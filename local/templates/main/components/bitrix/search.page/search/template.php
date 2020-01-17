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

$result = array("status" => true);

if(count($arResult["SEARCH"])){
	$items = array();
	foreach($arResult["SEARCH"] as $arItem){
		$items[] = array(
			"url" => $arItem["URL"],
			// "img" => SITE_TEMPLATE_PATH."/i/item-".$i.".jpg",
			// "img_hover" => SITE_TEMPLATE_PATH."/i/item-6.jpg",
			"name" => $arItem["TITLE"],
			// "price" => "16 500"
		);
	}
	$result["items"] = $items;
}else{
	$result["status"] = false;
	$result["errorMsg"] = "Поиск не дал результата. Попробуйте изменить запрос.";
}
echo json_encode($result);
die();
?>