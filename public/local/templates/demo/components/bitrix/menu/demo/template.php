<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
	  <div class="navbar-header">
	    <a class="navbar-brand" href="/">
	    	<?
    		$APPLICATION->IncludeFile(
				SITE_DIR."include/company_slogan.php",
				Array(),
				Array("MODE"=>"html")
			);
			?>
		</a>
	  </div>

	  <ul class="nav navbar-nav">
			<?foreach($arResult as $arItem):?>
				<?if($arItem["SELECTED"]):?>
					<li class="active"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>
			<?endforeach?>
		</ul>
	</div>
</nav>
<?endif?>
