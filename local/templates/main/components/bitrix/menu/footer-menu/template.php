<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?if(!isset($arParams['NO_WRAP'])):?>
<ul>
<?endif;?>

<?
foreach($arResult as $arItem):
	if(isset($arParams["IS_FOOTER"]) && $arItem["LINK"] == "/politics/")
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

<?if(!isset($arParams['NO_WRAP'])):?>
</ul>
<?endif;?>
<?endif?>