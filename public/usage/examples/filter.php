<?
$models = new \App\Catalog\Model;

$result = $models->getList([
	"select" => ["id", "name", "brandId", "brandName"],
	"filter" => ["brandId" => 120],
	"order" => ["name" => "asc"],
]);
?>
