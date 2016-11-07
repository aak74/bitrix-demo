<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");

/*
$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
);
*/
?>
<style>
		#myCarousel{
			display: none;
		}
</style>
<h1>Данная страница не существует!</h1>
Вы можете <a href=” http://www.carmax24.ru/”>перейти на главную страницу сайта</a>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>