<?

function includeArea($file){
	global $APPLICATION;
	$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
	        "AREA_FILE_SHOW" => "file", 
	        "PATH" => "/include/".$file.".php"
	    )
	);	
}

?>