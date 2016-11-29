<?php
$models = new \App\Catalog\Model;

$result = $models->getList([
    "select" => ["id", "name", "brandId", "brandName"],
]);
