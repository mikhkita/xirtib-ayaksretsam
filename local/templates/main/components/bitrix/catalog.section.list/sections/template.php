<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<ul class="b-catalog-menu-list">
	<?foreach ($arResult['SECTIONS'] as $arSection):?>
		<? $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit); ?>
		<? $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams); ?>
		<? $activeClass = ($_REQUEST['SECTION_CODE'] == $arSection['CODE']) ? 'active' : ''; ?>
		<li><a href="<?=$arSection['SECTION_PAGE_URL'];?>" class="<?=$activeClass?>" id="<? echo $this->GetEditAreaId($arSection['ID']);?>"><?=$arSection["NAME"]?></a></li>
	<?endforeach;?>
</ul>