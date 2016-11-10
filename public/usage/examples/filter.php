<?
$obj = new \App\Catalog\Model;

$result = $obj->getList([
	"select" => ["id", "name", "brandId", "brandName"],
	"filter" => ["brandId" => 47],
]);
?>
