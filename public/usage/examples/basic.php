<?
$obj = new \Gb\Catalog\Model;


$models = $obj->getList(array(
	// "select" => array("UF_BRAND")
	// "select" => array("id"),
	"select" => array("brandId", "brandName", "name"),
	// "filter" => array( "brandId" => 82 , "modelId" => 14 ),
	"filter" => array( "name" => "hyundai" ),
	// "filter" => array( "brandId" => 82 ),
));
?>
<pre>
	<?print_r($models)?>

</pre>