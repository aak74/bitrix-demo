<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors", 1);

$name = htmlspecialchars($_GET["name"]);
if (in_array($name, ["basic", "filter", "two", "filter-name"])) {
	require($_SERVER["DOCUMENT_ROOT"] . "/usage/examples/" . $name . ".php");

	ob_start();
	?>
	<pre class="pre-scrollable hljs">
	<?print_r($result);?>
	</pre>
	<?
	$output["html"] = ob_get_clean();
	if ( $output["html"] ) {
		$output["status"] = "ok";
	}
} else {
	$output["status"] = "error";
}

echo json_encode($output, JSON_HEX_AMP);
