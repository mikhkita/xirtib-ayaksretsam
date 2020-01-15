<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$GLOBALS['APPLICATION']->RestartBuffer();

	$result = array("status" => true);
	if(!empty($_GET["q"])){
		$items = array();
		for ($i=1; $i < 6; $i++) { 
			$items[] = array(
				"url" => "#",
				"img" => SITE_TEMPLATE_PATH."/i/item-".$i.".jpg",
				"img_hover" => SITE_TEMPLATE_PATH."/i/item-6.jpg",
				"name" => "Платье розовое волшебство",
				"price" => "16 500"
			);
		}
		$result["items"] = $items;
	}else{
		$result["status"] = false;
		$result["errorMsg"] = "Поиск не дал результата. Попробуйте изменить запрос.";
	}
	echo json_encode($result);
?>