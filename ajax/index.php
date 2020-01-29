<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule('sale');

$GLOBALS['APPLICATION']->RestartBuffer();

$action = (isset($_GET["action"])) ? $_GET["action"] : NULL;

switch ($action) {
	case 'ADD2BASKET':
		// $productId = $_GET["element_id"];
		// $quantity = (isset($_GET["quantity"]))?$_GET["quantity"]:1;

		// if (CModule::IncludeModule("catalog")){
		//     if (($action == "ADD2BASKET" || $action == "BUY")){
		//     	Add2BasketByProductID($productId, $quantity);
		// 		if($ex = $APPLICATION->GetException()){
  //     				$strError = $ex->GetString();
  //     				returnError("Ошибка! ".$strError);
  //     			}
		//     }
		// }
			
		// $result = getBasketCount();

		// if( isset($_GET["gift"]) ){
		// 	$result["action"] = "reload";
		// }

		// returnSuccess( $result );

		returnSuccess(array(
			"id" => 73,
			"name" => "Водолазка тонкой вязки",
			"color" => "коричневый",
			"size" => "S",
			"img" => "/local/templates/main/i/cart-1.jpg",
			"max" => 5,
			"quantity" => 2,
			"priceBase" => 6000,
			"priceTotal" => 5400,
		));

		break;
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