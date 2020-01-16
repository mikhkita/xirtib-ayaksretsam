<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404. Страница не найдена");
?>

<div class="b-404">
	<div class="b-block">
		<p class="b-404-text">Страницы, которую Вы запрашиваете, не существует.<br>Возможно она была удалена или Вы неправильно ввели адрес.</p>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>