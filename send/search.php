<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
	<?$APPLICATION->IncludeComponent("bitrix:search.page", "search", Array(
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над результатами
		"FILTER_NAME" => "",	// Дополнительный фильтр
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
		"PAGER_TEMPLATE" => "search",	// Название шаблона
		"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
		"PAGE_RESULT_COUNT" => "10",	// Количество результатов на странице
		"RESTART" => "Y",	// Искать без учета морфологии (при отсутствии результата поиска)
		"SHOW_WHEN" => "N",	// Показывать фильтр по датам
		"SHOW_WHERE" => "Y",	// Показывать выпадающий список "Где искать"
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
		"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
		"arrFILTER" => array("iblock_content"),
		"arrFILTER_iblock_content" => array("1","2"),
		"arrWHERE" => "",	// Значения для выпадающего списка "Где искать"
		),
		false
	);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<?
// $result = array("status" => true);
// if(!empty($_GET["q"])){
// 	$items = array();
// 	for ($i=1; $i < 6; $i++) { 
// 		$items[] = array(
// 			"url" => "#",
// 			"img" => SITE_TEMPLATE_PATH."/i/item-".$i.".jpg",
// 			"img_hover" => SITE_TEMPLATE_PATH."/i/item-6.jpg",
// 			"name" => "Платье розовое волшебство",
// 			"price" => "16 500"
// 		);
// 	}
// 	$result["items"] = $items;
// }else{
// 	$result["status"] = false;
// 	$result["errorMsg"] = "Поиск не дал результата. Попробуйте изменить запрос.";
// }
// echo json_encode($result);
?>