<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/skins/skin-green.min.css">
<!-- <link rel="stylesheet" href="/vendor/scrivo/highlight.php/styles/monokai_sublime.css"> -->
<?
// \Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js");
// \Bitrix\Main\Page\Asset::getInstance()->addJs("/vendor/almasaeed2010/adminlte/bootstrap/js/bootstrap.min.js");
// \Bitrix\Main\Page\Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js");
$APPLICATION->ShowHead();
?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="skin-green fixed sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="/" class="logo">
				<span class="logo-lg">Demo aak74/bitrix</span>
			</a>
			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle menu</span>
				</a>
				<span class="navbar-text navbar-left title">Package aak74/bitrix для работы с элементами в 1С-Bitrix | <?$APPLICATION->ShowTitle()?></span>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li><a href="http://greenbrown.ru">Разработано в greenbrown.ru</a></li>
						<li><a href="https://github.com/aak74/bitrix">Github</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "admin-lte", Array(
			"ROOT_MENU_TYPE" => "left",
			"MENU_CACHE_TYPE" => "Y",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => "",
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			),
			false
		);?>
		<div class="content-wrapper">
