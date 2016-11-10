<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Использование");

$hl = new \Highlight\Highlighter();
// $hl->setAutodetectLanguages(["php"]);
$code = $hl->setTabReplace("    ");
// $code = $hl->highlightAuto(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/usage/index.php"));
$examples = [
	"basic" => "Запрос из одного highload блока без фильтра",
	"filter" => "Запрос из одного highload блока с фильтром",
	"two" => "Запрос из двух highload блоков",
	"filter-name" => "Запрос из двух highload блоков с фильтром по значению в справочнике",
];
?>
<?foreach($examples as $name => $description):?>
	<?
	$code = $hl->highlightAuto(file_get_contents("examples/{$name}.php"));
	?>
	<div class="example">
		<h3><?=$description?></h3>
		<pre class="hljs php"><?=$code->value?></pre>
		<a class="btn btn-default show-result" data-name="<?=$name?>" href="#" role="button">Показать результат</a>
	</div>
<?endforeach;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>