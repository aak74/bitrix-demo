<?
namespace Gb\Catalog;

class ModelNew extends \Gb\Element\HlElement
{
	protected $entityName = 'ModelNew';
	protected $compressedFields = array("complectations", "modifications");

	public function getBrands()
	{
		$result = $this->getList(array(
			// "select" => array("brandId", "brandName"),
			"group" => array("brandId", "brandName"),
			"order" => array("brandName")
		));
		return $result;
	}

	public function getAllAutoWithPrice()
	{
		$result = $this->getList(array(
			"select" => array("id", "brandId", "brandName", "name", "prices"),
			"order" => array("brandName")
		));
		return $result;
	}

	public function getSimilarFourAuto($minPrice)
	{
		$result = $this->getList(array(
			"select" => array("id", "brandId", "brandName", "name", "minPrice", "colors", "code"),
			"order" => array("brandName"),
			"filter" => array(
				"<minPrice" => $minPrice+100000,
				">minPrice" => $minPrice-100000,
			),
			"limit" => 4
		));
		foreach ($result as $key => $value) {
			$result[$key]["colors"] = $this->getColor(json_decode($value["colors"], true));
			$result[$key]["photos"][0] = $result[$key]["colors"][0]["photo"];
		}
		return $result;
	}

	public function getModelsByBrandName($brandName)
	{
		$result = $this->getList(array(
			// "select" => array("brandId", "brandName"),
			"filter" => array("brandName" => $brandName),
			"order" => array("name" => "asc")
		));
		return $result;
	}
	public function checkBrand($brandName)
	{
		$check = $this->getList(array(
			"select" => array("brandId", "brandName"),
			"filter" => array("brandName" => $brandName),
			"group" => array("brandId", "brandName"),
			// "order" => array("name" => "asc")
		));
		if( !empty($check) && is_array($check) ) {
			$result = true;
		} else {
			$result = false;
		}

		return $result;
	}
	public function checkAuto($brandName, $alias)
	{
		$check = $this->getList(array(
			"select" => array("id", "brandId", "brandName", "code", "name"),
			"filter" => array("brandName" => $brandName, "code" => $alias),
			"group" => array("brandId", "brandName", "name"),
			// "order" => array("name" => "asc")
		));
		if( !empty($check) && is_array($check) ) {
			$result["name"] = $check[0]["name"];
			$result["check"] = true;
		} else {
			$result["check"] = false;
		}
		return $result;
	}
	public function getBrandId($brandName)
	{
		$result = $this->getRow(array(
			"select" => array("brandId", "brandName"),
			"filter" => array("brandName" => $brandName),
			"order" => array("name" => "asc")
		));
		return $result["brandId"];
	}
	public function getModelsByBrandId($brandId)
	{
		$result = $this->getList(array(
			// "select" => array("brandId", "brandName"),
			"filter" => array("brandId" => $brandId),
			"order" => array("name" => "asc")
		));
		return $result;
	}

	public function getAutoById($autoId)
	// public function getAutoById($brandName, $modelName, $autoId)
	{
		$result["id"] = $autoId;
		$auto = $this->getRow(array(
			"filter" => array(
				"id" => $autoId,
				// "brandName" => $brandName,
				// "code" => $alias
				)
			// "filter" => array("id" => $autoId)
		));
		
		$result = $this -> getRightParam($auto);

		return $result;
	}

	public function getAutoByBrandAndAlias($brandName, $alias)
	{
		$auto = $this->getRow(array(
			"filter" => array(
				// "id" => $autoId,
				"brandName" => $brandName,
				"code" => $alias
				)
			// "filter" => array("id" => $autoId)
		));

		$result = $this -> getRightParam($auto);

		return $result;
	}
	

	public function getMinPrice($prices)
	{
		$result = 10E+10; // Заведомо большое число
		if ( is_array($prices) ) {
			foreach ($prices as $value) {
				if($value["price"] != ""){
					$result = min($value["price"], $result);
				}
			}
		}
		if($result == 10E+10){
			$result = 0;
		}
		return $result;
	}
/*
	public function getComplectations($complectations, $prices)
	{
		$compl = json_decode($complectations, true);
		foreach ($compl as $complId => $complValue) {
			if( isset($prices[$complId]) ){
				$result[$complId] = $complValue;
			}
		}
		uasort($result, function($a, $b) {
			return $a["name"] > $b["name"];
		});

		return $result;
	}
*/

	public function getPriceForSale($price, $minPrice)
	{
		if( $minPrice <= 800000 ) {
			$salePrice = $price - 100000;
		} else if ( $minPrice > 800000 ) {
			$salePrice = $price - 200000;
		} else {
			$salePrice = 0;
		}

		return $salePrice;
	}

	public function getModificationsOrComplectaions($modOrCompl, $prices)
	{
		// $result = json_decode($modifications, true);
		$result = array_filter( 
			json_decode($modOrCompl, true), 
			function($item, $id) use ($prices) {
				return isset($prices[$id]);
			}, 
			ARRAY_FILTER_USE_BOTH
		);

		uasort($result, function($a, $b) {
			return $a["name"] > $b["name"];
		});
		return $result;
	}
	
	public function getModificationsAndComplectaionsArray($autoId)
		{
			$auto = $this -> getAutoById($autoId);

			$car["compl"] = $auto["complectations"];
			$car["modif"] = $auto["modifications"];
			$car["prices"] = $auto["prices"];

			foreach ( $car["prices"] as $salePriceId => $salePrice ) {
				if( !empty($salePrice["price"]) ){
					$car["prices"][$salePriceId]["price"] = $this -> getPriceForSale($salePrice["price"], $auto["minPrice"]);
				}
			}	

			foreach ( $car["prices"] as $price ) {
				if( $price["price"] != 0 && !empty($price["price"]) && !empty($car["compl"]) && !empty($car["modif"]) ) {
					$result[] = array(
						"modif" => $car["modif"][$price["modification"]]["name"],
						"compl" => $car["compl"][$price["complectation"]]["name"],
						"price" => number_format($price["price"], 0, ' ', ' ')." Р"
					);
				}
			}
			uasort($result, function($a, $b) {
				return $a["price"] > $b["price"];
			});

			return $result;
		}

	public function getColor($colors)
	{
		$objFile = new \Gb\File;
		foreach ($colors as $key => $value) {
			$result[$key] = array(
				"photo" => $objFile->getFileUrl($value["photo"]),
				"color" => $objFile->getFileUrl($value["color"]),
				"name" => $value["name"]
			);
		}
		$result[0]["selected"] = 1;
		return $result;
	}

	private function getRightParam($result)
	{
		$objFile = new \Gb\File;
		$result["colors"] = $this->getColor(json_decode($result["colors"], true));
		$result["prices"] = json_decode($result["prices"], true);

		foreach ($result["prices"] as $price) {
			if ( !empty($price["price"]) ) {
				$pricesForCompl[$price["complectation"]] = 1;
				$pricesForModif[$price["modification"]] = 1;
			}
		}

		$result["complectations"] = $this->getModificationsOrComplectaions($result["complectations"], $pricesForCompl);
		$result["modifications"] = $this->getModificationsOrComplectaions($result["modifications"], $pricesForModif);
		$result["photoExt"] = $objFile->getFilesUrl(json_decode($result["photoExt"], true));
		$result["photoInt"] = $objFile->getFilesUrl(json_decode($result["photoInt"], true));

		return $result;
	}
}