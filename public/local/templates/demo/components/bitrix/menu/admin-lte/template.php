<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<aside class="main-sidebar">
	<div class="sidebar">

		<ul class="sidebar-menu">
			<li class="header">
				<?
	    		$APPLICATION->IncludeFile(
					SITE_DIR."include/company_slogan.php",
					Array(),
					Array("MODE"=>"html")
				);
				?>
			</li>
			<?foreach($arResult as $arItem):?>
				<?if($arItem["SELECTED"]):?>
					<li class="active"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
				<?else:?>
					<li><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
				<?endif?>
			<?endforeach?>
		</ul>
	</div>
</aside>
<?endif;?>