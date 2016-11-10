<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$obModel = new \Akop\Element\HlElement(["blockName" => "GbAutoModel"]);

$models = $obModel->getList();

?>
<pre class="pre-scrollable">
<?print_r($models);?>
</pre>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>