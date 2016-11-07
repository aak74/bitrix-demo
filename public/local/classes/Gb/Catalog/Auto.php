<?
namespace Gb\Catalog;

class Auto extends \Gb\Element\HlElement
{
	const
		PATH_TO_PHOTOS = "/upload/photos/",
		ADD_CHAR_TO_PATH = 4,
		DELIMITER = ";";

	protected $entityName = 'Auto';
	protected $softDelete = true;

	public function addFromForm(array $params)
	{
		foreach ($params as $key => $value) {
			$params[$key] = htmlspecialchars($params[$key]);
		}

		// \Gb\Util::pr_var($params, 'params');
		$objBrand = new Brand;
		$brand = $objBrand->getRow(array(
			"filter" => array("xmlId" => $params["brandId"]),
		));
		$brandId = $brand["id"];

		$objModel = new Model;
		$model = $objModel->getRow(array(
			"filter" => array(
				"xmlId" => $params["modelId"],
				"brandId" => $brandId
			),
		));
		// при необходимости добавим в свою БД нужную модель авто
		if ( $model ) {
			$modelId = $model["id"];
		} else {
			$objExt = new Carapi\Model;
			$modelExt = $objExt->getRow(array(
				"filter" => array(
					"brandId" => $params["brandId"],
					"modelId" => $params["modelId"],
				)
			));

			// \Gb\Util::pr_var($modelExt, 'modelExt');

			$modelNew = array(
				"brandId" => $brand["id"],
				"xmlId" => $modelExt["autoru_id"],
				"name" => $modelExt["name"]
			);
			// \Gb\Util::pr_var(
			// 	$modelNew,
			// 	'model_new'
			// );

			$modelId = $objModel->add($modelNew);
		}

		$params["brandId"] = $brandId;
		$params["modelId"] = $modelId;
		// \Gb\Util::pr_var($params, 'params');

		// \Gb\Util::pr_var(
		// 	array(
		// 		"brand" => $brandId,
		// 		"model" => $modelId,
		// 	),
		// 	'result'
		// );

		return $this->add($params);
	}

	public function getOptions($id)
	{
		$obj = new \Gb\Catalog\OptionAuto;
		$list = $obj->getList(array(
			"select" => array("optionId", "optionName"),
			"filter" => array(
				"autoId" => $id
			)
		));
		foreach ($list as $key => $value) {
			$result[$value["optionId"]] = $value["optionName"];
		}
		return $result;
	}

	public function getPhotos($id)
	{
		$result = false;
		$item = $this->getRow(array(
			"select" => array("photos"),
			"filter" => array(
				"id" => $id
			)
		));
		if ( $item ) {
			$result = $this->getPhotosByStr($item["photos"]);
		}
		return $result;
	}

	public function getPhotosByStr($str)
	{
		$list = explode(self::DELIMITER, $str);

		foreach ($list as $key => $value) {
			if ( !empty($value) ) {
				$result[] = self::PATH_TO_PHOTOS . substr($value, 0, self::ADD_CHAR_TO_PATH) . "/" . $value;
			}
		}
		return $result;
	}

	public function getFirstPhoto($photos)
	{
		$result = "";
		if ( !empty( $photos) ) {
			$value = strstr($photos, self::DELIMITER, true);
			$result =  self::PATH_TO_PHOTOS
				. substr($value, 0, self::ADD_CHAR_TO_PATH)
				. "/" . $value;
		}
		return $result;
	}

	public function getBrands()
	{
		$result = false;
		$autos = $this->getList(array(
			"order" => array("brandName" => "asc"),
			"select" => array("brandId", "brandName"),
		));

		foreach ($autos as $autoId => $auto) {
			$result[$auto["brandId"]] = $auto["brandName"];
		}
		return $result;
	}

	public function getModelsByBrandName($brandName)
	{
		$result = false;
		$obj = new \Gb\Catalog\Brand;
		$item = $obj->getRow(array(
			"select" => array("id"),
			"filter" => array("name" => $brandName)
		));

		if ( $item ) {
			$result = $this->getModelsByBrandId($item["id"]);
		}
		return $result;
	}

	public function getModelsByBrandId($brandId)
	{
		$autos = $this->getList(array(
			"order" => array("modelName" => "asc"),
			"select" => array("modelId", "modelName"),
			"filter" => array("brandId" => $brandId)
		));

		foreach ($autos as $autoId => $auto) {
			$result[$auto["modelId"]] = $auto["modelName"];
		}
		return $result;
	}

	public function deactivateAnotherByXmlIds($ids)
	{
		$list = $this->getList(array(
			"filter" => array("deleted" => 0),
			"select" => array("id", "xmlId")
		));
		$deleted = 0;
		foreach ($list as $auto) {
			if ( !in_array($auto["xmlId"], $ids) ) {
				$this->update($auto["id"], array("deleted" => 1));
				$deleted++;
			}
		}
		return $deleted;
	}
}
