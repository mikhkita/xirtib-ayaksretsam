<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule('sale');

$GLOBALS['APPLICATION']->RestartBuffer();

$action = (isset($_GET["action"])) ? $_GET["action"] : NULL;

switch ($action) {
	case 'QUANTITY':

		// if( !isset($_GET["ELEMENT_ID"]) ){
		// 	returnError("Не указан ID товара");
		// }
		// if( !isset($_GET["QUANTITY"]) ){
		// 	returnError("Неверно передно количество");
		// }
		// $productId = $_GET["ELEMENT_ID"];

		// //Получение корзины текущего пользователя
		// $basket = \Bitrix\Sale\Basket::loadItemsForFUser(
		//    \Bitrix\Sale\Fuser::getId(), 
		//    \Bitrix\Main\Context::getCurrent()->getSite()
		// );

		// // Получение товара корзины по ID товара
		// if( $item = $basket->getItemById($productId) ){
		// 	$item->setField("QUANTITY", $_GET["QUANTITY"]);
		// }else{
		// 	returnError("Не найден товар с ID равным ".$productId);
		// }	

		// // //Сохранение изменений
		// if( $basket->save() ){
		// 	returnSuccess(array(
		// 		"id" => $_GET["ELEMENT_ID"],
		// 		"quantity" => intval($item->getField("QUANTITY"))
		// 	));
		// }else{
		// 	returnError("Не удалось сохранить товар");
		// }

		returnSuccess(array(
			"id" => $_GET["ELEMENT_ID"],
			"quantity" => $_GET["QUANTITY"]
		));

		break;

	default:
		# code...
		break;
}
die();

function returnError( $text ){
	echo json_encode(array(
		"result" => "error",
		"error" => $text
	));
	die();
}

function returnSuccess( $array ){
	$arResult = array(
		"result" => "success"
	);
	$arResult = $arResult + $array;

	echo json_encode($arResult);
	die();
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>