<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
	</div>
	<div class="footer">

	<?
	$APPLICATION->IncludeFile(
		SITE_DIR."include/counters.php",
		Array(),
		Array("MODE"=>"html")
	);
	?>
	</div>
</div>
<?
// \Bitrix\Main\Page\Asset::getInstance()->addCss("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css");
// \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/template_styles.css");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/local/js/gb_util.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/dist/js/app.min.js");
?>
</body>
</html>