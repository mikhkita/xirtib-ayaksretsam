<?

function includeArea($file){
	global $APPLICATION;
	$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
	        "AREA_FILE_SHOW" => "file", 
	        "PATH" => "/include/".$file.".php"
	    )
	);	
}

function vardump($str){
	echo "<pre style='text-align:left;'>";
	var_dump($str);
	echo "</pre>";
}

function convertPrice($price){
	return (!empty($price)) ? rtrim(rtrim(number_format($price, 1, '.', ' '),"0"),".") : "";
}

function resizePhoto($photo, $small = false){

	if ($small) {
		$arPhoto = CFile::ResizeImageGet($photo, Array("width" => 490, "height" => 735), BX_RESIZE_IMAGE_EXACT, false, false, false, 100);
	} else {
		$arPhoto = CFile::ResizeImageGet($photo, Array("width" => 892, "height" => 1338), BX_RESIZE_IMAGE_EXACT, false, false, false, 100);
	}

	return $arPhoto['src'];
}

function getColors($xml = false){
	$hldata = Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();
	$hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);

	$hlDataClass = $hldata['NAME'].'Table';
	$dbArr = array(
		'select' => array('UF_NAME', 'UF_XML_ID', 'UF_LINK', 'UF_DESCRIPTION'),
	    'order' => array('UF_NAME' =>'ASC'),
	);

	if (!empty($xml)) {
		$dbArr['filter'] = array('UF_XML_ID' => $xml);
	}

	$result = $hlDataClass::getList($dbArr);

	$arColors = array();

	while($res = $result->fetch()){
		$tmp = array();
		$tmp['NAME'] = $res['UF_NAME'];
		$tmp['CODE'] = $res['UF_XML_ID'];
		$tmp['IS_LIGHT'] = $res['UF_LINK'];
		$tmp['BORDER_CODE'] = $res['UF_DESCRIPTION'];
	    $arColors[] = $tmp;
	}

	return $arColors;
}

function addRecently($id){
	if( !isset( $_SESSION["RECENTLY"] ) ){
		$_SESSION["RECENTLY"] = array();
	}

	if( ($index = array_search($id, $_SESSION["RECENTLY"])) !== false ){
		unset( $_SESSION["RECENTLY"][$index] );
		$_SESSION["RECENTLY"] = array_values($_SESSION["RECENTLY"]);
	}

	array_unshift($_SESSION["RECENTLY"], $id);

	$_SESSION["RECENTLY"] = array_slice($_SESSION["RECENTLY"], 0, 21);
}

function getRecently($without = NULL){
	$out = array();

	if( isset( $_SESSION["RECENTLY"] ) ){
		$out = $_SESSION["RECENTLY"];

		if( $without !== NULL && ($index = array_search($without, $out)) !== false ){
			unset( $out[$index] );
			$out = array_values($out);
		}
	}

	return $out;
}

?>