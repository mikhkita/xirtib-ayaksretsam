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
$this->setFrameMode(true); ?>

<? if(count($arResult["ITEMS"])): ?>
	<div class="b-slider-with-descr-cont">
		<div class="b-block">
			<div class="b-slider-descr">
				<h2><?=$arParams['CUSTOM_TITLE']?></h2>
			</div>
			<div class="b-slider-with-descr">
				<div class="b-slider-with-descr-inner-cont">
					<div class="b-slider-with-descr-inner">
						<? foreach ($arResult["ITEMS"] as $arItem): ?>
							<? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
							<? $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
							<? $minVal = 10000000; ?>
							<? $maxVal = 0; ?>

							<? foreach ($arItem["OFFERS"] as $offer): ?>
								<? if( $offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"] != $offer["PRICES"]["PRICE"]["VALUE"] ): ?>
									<? $class = "has-discount"; ?>
								<? endif; ?>

								<? if( $offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"] < $minVal): ?>
									<? $minVal = $offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"]; ?>
								<? endif; ?>

								<? if( $offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"] > $maxVal): ?>
									<? $maxVal = $offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"]; ?>
								<? endif; ?>

								<? $price = convertPrice($offer["PRICES"]["PRICE"]["VALUE"]); ?>
								<? $discountPrice = convertPrice($offer["PRICES"]["PRICE"]["DISCOUNT_VALUE"]); ?>
							<? endforeach; ?>

							<? if ($minVal != $maxVal): ?>
								<? $minVal = convertPrice($minVal); ?>
								<? $maxVal = convertPrice($maxVal); ?>
								<? $price = $minVal; ?>
								<? /*$price = $minVal.'</span> - <span class="icon-ruble-bold">'.$maxVal */?>
								<? $differentPriceClass = 'different-price'; ?>
								<? $class = ''; ?>
							<? endif; ?>

							<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-catalog-item">
								<div class="b-catalog-item-img">
									<? if ($arItem['PROPERTIES']['PHOTOS']['VALUE']): ?>
										<img src="<?=resizePhoto(CFile::GetByID($arItem['PROPERTIES']['PHOTOS']['VALUE'][0])->Fetch())?>">
										<img src="<?=resizePhoto(CFile::GetByID($arItem['PROPERTIES']['PHOTOS']['VALUE'][1])->Fetch())?>" class="hover">
									<? endif; ?>
								</div>
								<div class="b-catalog-item-text"><?=$arItem['NAME']?></div>
								<div class="b-catalog-item-text"><?=$price?> руб.</div>
							</a>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>