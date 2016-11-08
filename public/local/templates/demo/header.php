<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/skins/skin-blue.min.css">

<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy">
	<?CJSCore::Init(array("jquery"));?>
	<div class="page-wrapper">
		<div id="panel"><?$APPLICATION->ShowPanel();?></div>
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
