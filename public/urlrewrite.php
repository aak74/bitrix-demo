<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/cars/(.*)/(.*)/([0-9]*)#",
		"RULE" => "brand=\$1&model=\$2&auto=\$3",
		"ID" => "",
		"PATH" => "/cars/auto.php",
	),
	array(
		"CONDITION" => "#^/buy/new-car/(.*)/(.*)#",
		"RULE" => "brand=\$1&model=\$2",
		"ID" => "",
		"PATH" => "/buy/new-car/auto.php",
	),
	array(
		"CONDITION" => "#^/buy/new-car/(.*)?#",
		"RULE" => "brand=\$1",
		"ID" => "",
		"PATH" => "/buy/new-car/brand.php",
	),
	array(
		"CONDITION" => "#^/cars/(.*)/(.*)#",
		"RULE" => "brand=\$1&model=\$2",
		"ID" => "",
		"PATH" => "/cars/model.php",
	),
	array(
		"CONDITION" => "#^/cars/(.*)?#",
		"RULE" => "brand=\$1",
		"ID" => "",
		"PATH" => "/cars/brand.php",
	),
	array(
		"CONDITION" => "#^/products/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/products/index.php",
	),
	array(
		"CONDITION" => "#^/reviews/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/reviews/index.php",
	),
	array(
		"CONDITION" => "#^/stati/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/stati/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
);

?>