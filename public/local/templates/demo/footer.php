<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
	<div class="log"></div>
	</div>
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			Version: 0.1.0
		</div>
		<strong><a href="http://greenbrown.ru">Разработано в greenbrown.ru</a></strong> All rights reserved.
		<?
		$APPLICATION->IncludeFile(
			SITE_DIR."include/counters.php",
			Array(),
			Array("MODE"=>"html")
		);
		?>
	</footer>
</div>
<?
// \Bitrix\Main\Page\Asset::getInstance()->addCss("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css");
// \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/template_styles.css");
// \Bitrix\Main\Page\Asset::getInstance()->addJs("https://code.jquery.com/jquery-1.12.4.min.js");
// \Bitrix\Main\Page\Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js");
// \Bitrix\Main\Page\Asset::getInstance()->addCss("/vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/bootstrap/js/bootstrap.min.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/dist/js/app.min.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/plugins/slimScroll/jquery.slimscroll.min.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/local/js/gb_util.js");
\Bitrix\Main\Page\Asset::getInstance()->addJs("/local/js/app.js");
?>
</body>
</html>